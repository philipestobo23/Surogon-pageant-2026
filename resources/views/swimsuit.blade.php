@extends('layouts.app')

@section('content')

{{-- ══ SAME FUTURISTIC BACKGROUND AS HOME ══ --}}
<div class="hd-bg" aria-hidden="true">
    <div class="hd-base"></div>
    <div class="hd-orb hd-orb-1"></div>
    <div class="hd-orb hd-orb-2"></div>
    <div class="hd-orb hd-orb-3"></div>
    <div class="hd-orb hd-orb-4"></div>
    <div class="hd-orb hd-orb-5"></div>
    <div class="hd-grid"></div>
    <div class="hd-scan"></div>
    <canvas class="hd-stars" id="hd-star-canvas"></canvas>
    <div class="hd-edge-top"></div>
</div>

<div class="sw-page">

    {{-- ── Page Header ── --}}
    <div class="sw-header">
        <div class="sw-header-inner">
            <div class="sw-header-left">
                <div class="sw-icon-wrap">
                    <i class="bi bi-hearts"></i>
                </div>
                <div>
                    <p class="sw-label">Top 10 Selection · Round 1</p>
                    <h2 class="sw-title">Swimwear Category</h2>
                </div>
            </div>
            <div class="sw-header-right">
                <span class="sw-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 – 10.0</span>
                <a href="{{ route('home') }}" class="sw-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
        <div class="sw-reminder">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="sw-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>
    </div>

    {{-- ── Contestant Grid ── --}}
    <form id="swimsuit-form">
        @csrf
        <div class="sw-grid">
            @foreach($data as $key => $datum)
            <div class="sw-card">
                {{-- contestant number badge --}}
                <div class="sw-num-badge">{{ $datum[0] }}</div>

                {{-- photo --}}
                <div class="sw-photo-wrap">
                    <img src="{{ asset('cons/' . $datum[0] . '.jpg') }}"
                         alt="Contestant {{ $datum[0] }}"
                         class="sw-photo"
                         onerror="this.src='{{ asset('images/surigay_logo.png') }}'">
                    <div class="sw-photo-overlay"></div>
                </div>

                {{-- info + score --}}
                <div class="sw-card-body">
                    <p class="sw-contestant-label">Contestant</p>
                    <p class="sw-contestant-name">{{ $datum[1] }}</p>

                    <div class="sw-score-wrap">
                        <label class="sw-score-label">
                            <i class="bi bi-pen-fill me-1"></i>Score
                        </label>
                        <input class="sw-score-input"
                               type="number"
                               step="0.1"
                               min="1"
                               max="10"
                               value="{{ $datum[2] }}"
                               name="{{ $datum[3] }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── Bottom reminder + submit ── --}}
        <div class="sw-reminder sw-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="sw-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="sw-submit-btn">
                <span class="sw-submit-ring"></span>
                <span class="sw-submit-ring sw-submit-ring-2"></span>
                <span class="sw-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" class="sw-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>

    {{-- ── Ranking Table (revealed after submit) ── --}}
    <div id="rank-table-container" class="sw-rank-section" hidden>
        <div class="sw-rank-card">
            <div class="sw-rank-header">
                <i class="bi bi-trophy-fill me-2"></i>Swimwear Rankings
            </div>
            <p class="sw-rank-judge">
                <i class="bi bi-person-circle me-1"></i>
                {{ Auth::user()->RealName ?? Auth::user()->name }}
            </p>
            <div class="table-responsive">
                <table class="sw-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="sw-signature">
                <div class="sw-sig-line">{{ Auth::user()->name }} — {{ Auth::user()->RealName }}</div>
                <div class="sw-sig-desc">Judge's Signature</div>
            </div>
            <div class="sw-print-wrap swim-print">
                <button class="sw-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
            </div>
        </div>
    </div>

</div>{{-- /sw-page --}}

<style>
/* ─── tokens ──────────────────────────────────────────── */
:root {
    --cosmos-bg:      #04001a;
    --cosmos-surface: rgba(12, 4, 48, 0.72);
    --cosmos-border:  rgba(140, 70, 255, 0.28);
    --cosmos-glow1:   #aa44ff;
    --text-primary:   #f0ebff;
    --text-secondary: #a89acc;
    --radius-card:    20px;
    --radius-btn:     14px;
    --transition:     all 0.3s cubic-bezier(.4,0,.2,1);
}

/* ─── page wrapper ──────────────────────────────────── */
.sw-page {
    min-height: calc(100vh - 70px);
    padding: 24px 20px 100px;
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* ─── page header ───────────────────────────────────── */
.sw-header {
    background: linear-gradient(135deg, rgba(0,150,200,0.22) 0%, rgba(8,2,45,0.80) 100%);
    border: 1px solid rgba(0,190,230,0.30);
    border-radius: var(--radius-card);
    backdrop-filter: blur(20px);
    padding: 20px 26px 14px;
    margin-bottom: 28px;
    box-shadow: 0 0 40px rgba(0,180,220,0.12), inset 0 1px 0 rgba(100,220,255,0.08);
    position: relative;
    overflow: hidden;
}

.sw-header::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, #00ccee, #0088cc, #00ccee);
    border-radius: var(--radius-card) var(--radius-card) 0 0;
}

.sw-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    margin-bottom: 14px;
}

.sw-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.sw-icon-wrap {
    width: 52px; height: 52px;
    border-radius: 15px;
    background: rgba(0,170,200,0.25);
    border: 1px solid rgba(0,200,240,0.35);
    display: grid; place-items: center;
    font-size: 1.5rem;
    color: #33ddee;
    box-shadow: 0 0 18px rgba(0,200,230,0.30);
    flex-shrink: 0;
}

.sw-label {
    font-size: 0.68rem;
    letter-spacing: 0.20em;
    text-transform: uppercase;
    color: var(--text-secondary);
    margin: 0 0 3px;
}

.sw-title {
    font-family: 'Orbitron', 'Rajdhani', sans-serif;
    font-size: clamp(1.1rem, 3vw, 1.55rem);
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    text-shadow: 0 0 18px rgba(0,200,230,0.50);
}

.sw-header-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.sw-rate-badge {
    padding: 6px 14px;
    border-radius: 50px;
    background: rgba(0,170,200,0.20);
    border: 1px solid rgba(0,200,240,0.35);
    font-size: 0.75rem;
    letter-spacing: 0.10em;
    color: #55eeff;
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600;
}

.sw-back-btn {
    display: flex; align-items: center;
    padding: 8px 18px;
    border-radius: var(--radius-btn);
    background: rgba(200, 30, 80, 0.22);
    border: 1px solid rgba(230, 60, 100, 0.40);
    color: #ff88aa;
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-decoration: none;
    transition: var(--transition);
}

.sw-back-btn:hover {
    background: rgba(220, 30, 80, 0.35);
    border-color: rgba(255, 60, 110, 0.65);
    color: #ffaabb;
    box-shadow: 0 0 16px rgba(220,30,80,0.30);
    transform: translateX(-2px);
    text-decoration: none;
}

.sw-reminder {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.80rem;
    color: var(--text-secondary);
    background: rgba(80, 30, 160, 0.20);
    border: 1px solid rgba(120,60,220,0.25);
    border-radius: 10px;
    padding: 8px 14px;
}

.sw-reminder i { color: #aa77ff; flex-shrink: 0; }
.sw-reminder strong { color: #ff9966; }
.sw-rem-submit { color: #66ccff; font-weight: 600; }
.sw-reminder-bottom { margin: 0 0 24px; }

/* ─── contestant grid ───────────────────────────────── */
.sw-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 28px;
}

@media (min-width: 576px) {
    .sw-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (min-width: 768px) {
    .sw-grid { grid-template-columns: repeat(4, 1fr); gap: 18px; }
}

@media (min-width: 1024px) {
    .sw-grid { grid-template-columns: repeat(5, 1fr); gap: 16px; }
}

@media (min-width: 1280px) {
    .sw-grid { gap: 18px; }
}

/* ─── contestant card ───────────────────────────────── */
.sw-card {
    position: relative;
    border-radius: var(--radius-card);
    background: rgba(10, 4, 48, 0.70);
    border: 1px solid rgba(0, 190, 230, 0.25);
    backdrop-filter: blur(14px);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: var(--transition);
    box-shadow: 0 4px 24px rgba(0,150,200,0.12);
}

.sw-card:hover {
    transform: translateY(-5px);
    border-color: rgba(0,220,255,0.50);
    box-shadow: 0 8px 36px rgba(0,180,230,0.22);
}

/* number badge */
.sw-num-badge {
    position: absolute;
    top: 10px; left: 10px;
    z-index: 3;
    width: 36px; height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0055cc, #003888);
    border: 2px solid rgba(80,160,255,0.70);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.85rem;
    font-weight: 700;
    color: #fff;
    box-shadow: 0 0 12px rgba(0,120,255,0.55);
}

/* photo */
.sw-photo-wrap {
    position: relative;
    width: 100%;
    aspect-ratio: 3/4;
    overflow: hidden;
    background: #08002a;
}

.sw-photo {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.sw-card:hover .sw-photo { transform: scale(1.05); }

.sw-photo-overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 55%;
    background: linear-gradient(to top, rgba(6,0,36,0.92) 0%, transparent 100%);
    pointer-events: none;
}

/* card body */
.sw-card-body {
    padding: 12px 14px 14px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex: 1;
}

.sw-contestant-label {
    font-size: 0.65rem;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--text-secondary);
    margin: 0;
}

.sw-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600;
    font-size: 0.92rem;
    color: var(--text-primary);
    margin: 0 0 4px;
    line-height: 1.25;
}

/* score input */
.sw-score-wrap { margin-top: auto; }

.sw-score-label {
    display: flex; align-items: center;
    font-size: 0.72rem;
    color: #55ccee;
    font-weight: 600;
    letter-spacing: 0.10em;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.sw-score-input {
    width: 100%;
    background: rgba(0, 100, 160, 0.20);
    border: 1px solid rgba(0, 180, 220, 0.45);
    border-radius: 10px;
    color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.2rem;
    font-weight: 700;
    text-align: center;
    padding: 8px 10px;
    transition: var(--transition);
    outline: none;
    -moz-appearance: textfield;
}

.sw-score-input::-webkit-inner-spin-button,
.sw-score-input::-webkit-outer-spin-button { -webkit-appearance: none; }

.sw-score-input:focus {
    border-color: rgba(0,220,255,0.80);
    background: rgba(0,130,190,0.28);
    box-shadow: 0 0 16px rgba(0,200,240,0.35);
    color: #aaf0ff;
}

/* ─── floating submit button ──────────────────────── */
.floating-button {
    position: fixed;
    bottom: 26px;
    right: 26px;
    z-index: 1000;
    display: flex;
    gap: 10px;
    flex-direction: column;
    align-items: flex-end;
}

.sw-submit-btn {
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding: 15px 36px;
    border-radius: 50px;
    background: linear-gradient(135deg, #00aaff 0%, #0055dd 50%, #6600ff 100%);
    background-size: 200% 200%;
    border: none;
    outline: 2px solid rgba(100,180,255,0.55);
    outline-offset: 3px;
    color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.92rem;
    font-weight: 700;
    letter-spacing: 0.10em;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.35s cubic-bezier(.4,0,.2,1);
    box-shadow:
        0 0 0 0 rgba(0,160,255,0),
        0 6px 28px rgba(0,110,255,0.55),
        inset 0 1px 0 rgba(255,255,255,0.20);
    animation: submitGradientShift 3s ease infinite, submitPop 2.5s ease-in-out infinite;
}

/* pulsing rings */
.sw-submit-ring {
    position: absolute;
    inset: 0;
    border-radius: 50px;
    border: 2px solid rgba(80,180,255,0.70);
    animation: submitRingExpand 2s ease-out infinite;
    pointer-events: none;
}

.sw-submit-ring-2 {
    animation-delay: 0.7s;
    border-color: rgba(160,100,255,0.50);
}

@keyframes submitRingExpand {
    0%   { transform: scale(1);    opacity: 0.9; }
    100% { transform: scale(1.35); opacity: 0; }
}

/* shimmer sweep */
.sw-submit-shimmer {
    position: absolute;
    top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.28) 50%, transparent 60%);
    animation: submitShimmer 2.4s ease-in-out infinite;
    pointer-events: none;
    border-radius: 50px;
}

@keyframes submitShimmer {
    0%   { left: -75%; }
    60%,100% { left: 130%; }
}

@keyframes submitGradientShift {
    0%,100% { background-position: 0% 50%; }
    50%     { background-position: 100% 50%; }
}

@keyframes submitPop {
    0%,100% { box-shadow: 0 6px 28px rgba(0,110,255,0.55), inset 0 1px 0 rgba(255,255,255,0.20); }
    50%     { box-shadow: 0 8px 40px rgba(0,150,255,0.75), 0 0 24px rgba(120,60,255,0.40), inset 0 1px 0 rgba(255,255,255,0.22); }
}

.sw-submit-btn:hover {
    transform: translateY(-3px) scale(1.04);
    outline-color: rgba(160,210,255,0.85);
    box-shadow: 0 10px 48px rgba(0,140,255,0.70), 0 0 32px rgba(100,60,255,0.45), inset 0 1px 0 rgba(255,255,255,0.22);
}

.sw-submit-btn:active {
    transform: translateY(0) scale(0.97);
}

.sw-generate-btn {
    display: flex; align-items: center;
    padding: 10px 20px;
    border-radius: 50px;
    background: linear-gradient(135deg, #007755, #004433);
    border: 1px solid rgba(0,200,140,0.45);
    color: #aaffdd;
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.88rem;
    font-weight: 600;
    letter-spacing: 0.06em;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 20px rgba(0,160,110,0.35);
}

.sw-generate-btn:hover {
    background: linear-gradient(135deg, #009966, #006644);
    transform: translateY(-2px);
}

/* ─── ranking section ─────────────────────────────── */
.sw-rank-section {
    margin-top: 40px;
    padding-bottom: 40px;
}

.sw-rank-card {
    background: var(--cosmos-surface);
    border: 1px solid rgba(0,200,240,0.28);
    border-radius: var(--radius-card);
    backdrop-filter: blur(18px);
    padding: 28px;
    box-shadow: 0 4px 30px rgba(0,150,200,0.14);
    position: relative;
    overflow: hidden;
}

.sw-rank-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, #00ccee, #0088cc, #00ccee, transparent);
}

.sw-rank-header {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: #55eeff;
    margin-bottom: 6px;
    text-shadow: 0 0 14px rgba(0,200,230,0.45);
}

.sw-rank-judge {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.95rem;
    color: var(--text-secondary);
    margin-bottom: 20px;
}

.sw-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.95rem;
}

.sw-table thead tr {
    background: rgba(0, 120, 180, 0.25);
}

.sw-table th {
    padding: 12px 16px;
    text-align: center;
    color: #55eeff;
    font-size: 0.78rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    border-bottom: 1px solid rgba(0,190,230,0.30);
}

.sw-table td {
    padding: 12px 16px;
    text-align: center;
    color: var(--text-primary);
    border-bottom: 1px solid rgba(100,50,200,0.15);
}

.sw-table tbody tr:hover {
    background: rgba(0, 100, 160, 0.18);
}

.sw-signature {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 28px;
    gap: 6px;
}

.sw-sig-line {
    padding: 6px 28px;
    border-bottom: 2px solid rgba(180,150,255,0.60);
    font-family: 'Orbitron', sans-serif;
    font-size: 0.85rem;
    color: var(--text-primary);
    letter-spacing: 0.08em;
}

.sw-sig-desc {
    font-size: 0.72rem;
    color: var(--text-secondary);
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.sw-print-wrap {
    display: flex;
    justify-content: center;
    margin-top: 22px;
}

.sw-print-btn {
    display: flex; align-items: center;
    padding: 10px 28px;
    border-radius: 50px;
    background: linear-gradient(135deg, rgba(200,160,0,0.30), rgba(160,100,0,0.35));
    border: 1px solid rgba(220,180,0,0.45);
    color: #ffe066;
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: 0.08em;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 18px rgba(200,160,0,0.25);
}

.sw-print-btn:hover {
    background: linear-gradient(135deg, rgba(220,180,0,0.40), rgba(180,120,0,0.45));
    box-shadow: 0 6px 26px rgba(220,180,0,0.35);
    transform: translateY(-2px);
}

/* ─── background (same as home.blade.php) ─────────── */
body, #app, #main-content {
    background: transparent !important;
    position: relative;
}
body { background-color: #03001c !important; }

.hd-bg {
    position: fixed; inset: 0; z-index: 0;
    overflow: hidden; pointer-events: none;
}
.hd-base {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse 120% 80% at 50% 0%,   #12005e 0%,  transparent 60%),
        radial-gradient(ellipse 100% 60% at 100% 100%, #000a3a 0%,  transparent 55%),
        radial-gradient(ellipse 90%  70% at 0%   100%, #1a003a 0%,  transparent 55%),
        linear-gradient(175deg, #03001c 0%, #07003a 35%, #0a0035 60%, #02001a 100%);
}
.hd-orb {
    position: absolute; border-radius: 50%;
    filter: blur(90px); opacity: 0;
    animation: orbPulse var(--dur,12s) ease-in-out var(--delay,0s) infinite;
}
.hd-orb-1{width:520px;height:520px;background:radial-gradient(circle,rgba(120,0,255,.38) 0%,transparent 70%);top:-10%;left:-8%;--dur:14s;--delay:0s}
.hd-orb-2{width:420px;height:420px;background:radial-gradient(circle,rgba(60,0,180,.32) 0%,transparent 70%);top:20%;right:-6%;--dur:11s;--delay:2s}
.hd-orb-3{width:600px;height:350px;background:radial-gradient(ellipse,rgba(80,20,200,.28) 0%,transparent 70%);bottom:-5%;left:15%;--dur:16s;--delay:4s}
.hd-orb-4{width:300px;height:300px;background:radial-gradient(circle,rgba(160,40,255,.25) 0%,transparent 70%);top:45%;left:40%;--dur:9s;--delay:1.5s}
.hd-orb-5{width:380px;height:260px;background:radial-gradient(ellipse,rgba(30,0,120,.30) 0%,transparent 70%);top:5%;right:25%;--dur:13s;--delay:3s}
@keyframes orbPulse{0%,100%{opacity:0;transform:scale(.92)}40%,60%{opacity:1;transform:scale(1.06)}}

.hd-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(100,50,255,.07) 1px,transparent 1px),
        linear-gradient(90deg,rgba(100,50,255,.07) 1px,transparent 1px);
    background-size:52px 52px;
    mask-image:linear-gradient(to bottom,transparent 0%,rgba(0,0,0,.5) 30%,rgba(0,0,0,.5) 70%,transparent 100%);
    -webkit-mask-image:linear-gradient(to bottom,transparent 0%,rgba(0,0,0,.5) 30%,rgba(0,0,0,.5) 70%,transparent 100%);
    animation:gridDrift 30s linear infinite;
}
@keyframes gridDrift{from{background-position:0 0,0 0}to{background-position:52px 52px,52px 52px}}

.hd-scan {
    position:absolute;left:0;right:0;height:220px;
    background:linear-gradient(to bottom,transparent,rgba(120,50,255,.06),transparent);
    animation:scanSweep 8s linear infinite;pointer-events:none;
}
@keyframes scanSweep{from{top:-220px}to{top:110%}}

.hd-stars { position:absolute;inset:0;width:100%;height:100%; }

.hd-edge-top {
    position:absolute;top:0;left:0;right:0;height:2px;
    background:linear-gradient(90deg,transparent 0%,rgba(120,50,255,.6) 20%,rgba(200,100,255,.9) 50%,rgba(120,50,255,.6) 80%,transparent 100%);
    animation:edgePulse 4s ease-in-out infinite;
}
@keyframes edgePulse{0%,100%{opacity:.5}50%{opacity:1;box-shadow:0 0 20px rgba(180,80,255,.6)}}
</style>

@endsection

@push('scripts')
<script>
    function printDiv() {
        var divContents = document.getElementById("rank-table-container").innerHTML;
        var a = window.open('', '', 'height=1000, width=700');
        a.document.write('<html>');
        a.document.write(
            `<head><style>@media print { body { text-align:center; margin-top:50px; font-family:Arial,sans-serif; }
            table { margin:0 auto; border-collapse:collapse; }
            th, td { padding:12px 18px; text-align:center; border:1px solid #000; }
            h1 { font-size:36px; margin-bottom:20px; }
            .sw-signature { margin-top:30px; display:flex; flex-direction:column; align-items:center; gap:6px; }
            .sw-sig-line { border-bottom:2px solid black; padding:0 30px; font-size:14px; }
            .sw-sig-desc { font-size:12px; }
            .sw-print-wrap { display:none; }
            .sw-rank-judge { font-size:18px; margin-bottom:20px; }
            .sw-rank-header { font-size:28px; margin-bottom:8px; }
            }</style></head>`
        );
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }

    // Star canvas (same as home)
    (function() {
        const canvas = document.getElementById('hd-star-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let stars = [];
        function resize() {
            canvas.width  = window.innerWidth;
            canvas.height = window.innerHeight;
            stars = Array.from({length: 180}, () => ({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                r: Math.random() * 1.4 + 0.2,
                a: Math.random(),
                spd: Math.random() * 0.006 + 0.002,
                phase: Math.random() * Math.PI * 2,
                hue: [240,260,280,300,200][Math.floor(Math.random()*5)]
            }));
        }
        function draw(t) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            stars.forEach(s => {
                s.a = 0.35 + 0.65 * Math.abs(Math.sin(t * s.spd + s.phase));
                ctx.beginPath();
                ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
                ctx.fillStyle = `hsla(${s.hue},80%,85%,${s.a})`;
                ctx.fill();
            });
            requestAnimationFrame(draw);
        }
        window.addEventListener('resize', resize);
        resize();
        requestAnimationFrame(draw);
    })();
</script>
<script type="module">
    $(document).ready(function () {
        $("input[type=number]").on('focus', function () { this.select(); });

        $('#swimsuit-form').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('post_swimsuit_form') }}',
                data: formData,
                success: function (response) {
                    Swal.fire({ title: "Scores Saved", text: "Swimwear grading submitted successfully.", icon: "success", background: '#07003a', color: '#f0ebff', confirmButtonColor: '#0066dd' });
                    $('#generate-rank').trigger('click');
                },
                error: function (error) {
                    const e = error.responseJSON;
                    Swal.fire({ title: "Submission Error", text: JSON.stringify(e), icon: "error", background: '#07003a', color: '#f0ebff' });
                }
            });
        });

        $('#generate-rank').click(function (event) {
            event.preventDefault();
            $('#rank-table').empty();
            $.ajax({
                type: 'GET',
                url: '{{ route('rank_swimsuit') }}',
                success: function (response) {
                    $.each(response.ranking, function (key, value) {
                        $('#rank-table').append(`
                            <tr>
                                <td>${value.ranking}</td>
                                <td>${value.contestant_number}</td>
                                <td>${value.contestant_name}</td>
                                <td>${value.score}</td>
                            </tr>`);
                    });
                    $('#rank-table-container').removeAttr('hidden');
                    document.getElementById('rank-table-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
                },
                error: function (error) { console.error(error); }
            });
        });
    });
</script>
@endpush
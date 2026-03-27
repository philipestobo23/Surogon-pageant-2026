@extends('layouts.app')

@section('content')

<div class="qt-page">

    {{-- ── Page Header ── --}}
    <div class="qt-header">
        <div class="qt-header-inner">
            <div class="qt-header-left">
                <div class="qt-icon-wrap">
                    <i class="bi bi-chat-quote-fill"></i>
                </div>
                <div>
                    <p class="qt-label">Top 8 · Round 2</p>
                    <h2 class="qt-title">Snap Talk</h2>
                </div>
            </div>
            <div class="qt-header-right">
                <span class="qt-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 – 10.0</span>
                <a href="{{ route('home') }}" class="qt-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
        <div class="qt-reminder">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="qt-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>
    </div>

    {{-- ── Contestant Grid ── --}}
    @if(count($data) > 0)
    <form id="question-form" hx-boost="false">
        @csrf
        <div class="qt-grid">
            @foreach($data as $key => $datum)
            <div class="qt-card" style="--card-i:{{ $loop->index }}">
                <div class="qt-num-badge">{{ $datum[0] }}</div>
                <div class="qt-photo-wrap">
                    <div class="qt-photo-skeleton"></div>
                    <img src="{{ asset('cons/' . $datum[0] . '.webp') }}"
                         alt="Contestant {{ $datum[0] }}"
                         class="qt-photo"
                         loading="lazy"
                         decoding="async"
                         onload="this.classList.add('loaded');this.previousElementSibling.style.display='none';"
                         onerror="this.classList.add('loaded');this.previousElementSibling.style.display='none';this.src='{{ asset('images/KS1.png') }}';">
                    <div class="qt-photo-overlay"></div>
                    <div class="qt-crown-icon"><i class="bi bi-patch-check-fill"></i></div>
                </div>
                <div class="qt-card-body">
                    <p class="qt-contestant-label">Contestant</p>
                    <p class="qt-contestant-name">{{ $datum[1] }}</p>
                    <div class="qt-score-wrap">
                        <label class="qt-score-label"><i class="bi bi-pen-fill me-1"></i>Score</label>
                        <div class="qt-stepper">
                            <input class="qt-score-input" type="number" step="0.1" min="1" max="10"
                                   value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                            <div class="qt-stepper-btns">
                                <button type="button" class="qt-step-btn qt-step-up" tabindex="-1"><i class="bi bi-chevron-up"></i></button>
                                <button type="button" class="qt-step-btn qt-step-dn" tabindex="-1"><i class="bi bi-chevron-down"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="qt-reminder qt-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="qt-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="qt-submit-btn">
                <span class="qt-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" type="button" class="qt-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>
    @else
    {{-- ── Empty State (no Top 8 selected yet) ── --}}
    <div class="qt-empty-state">
        <div class="qt-empty-icon"><i class="bi bi-hourglass-split"></i></div>
        <h3 class="qt-empty-title">No Contestants Available</h3>
        <p class="qt-empty-desc">
            The Top 8 has not been determined yet.<br>
            Round 1 rankings must be finalized before Snap Talk scoring can begin.
        </p>
        <a href="{{ route('home') }}" class="qt-empty-back">
            <i class="bi bi-house-fill me-2"></i>Back to Home
        </a>
    </div>
    @endif

    {{-- ── Ranking Table ── --}}
    <div id="rank-table-container" class="qt-rank-section" hidden>
        <div class="qt-rank-card">
            <div class="qt-rank-header"><i class="bi bi-trophy-fill me-2"></i>Snap Talk Rankings</div>
            <p class="qt-rank-judge"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->RealName ?? Auth::user()->name }}</p>
            <div class="table-responsive">
                <table class="qt-table">
                    <thead><tr><th>Rank</th><th>No.</th><th>Contestant Name</th><th>Score</th></tr></thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="qt-signature">
                <div class="qt-sig-line">{{ Auth::user()->name }} — {{ Auth::user()->RealName }}</div>
                <div class="qt-sig-desc">Judge's Signature</div>
            </div>
            <div class="qt-print-wrap qt-print">
                <button class="qt-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
                <a href="{{ route('home') }}" class="qt-home-btn">
                    <i class="bi bi-house-fill me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>

</div>

<style>
:root {
    --qt-gold:        #f5c842;
    --qt-gold-light:  #ffe98a;
    --qt-gold-dim:    #b89020;
    --qt-text:        #fff8e7;
    --qt-text-muted:  #c8aa60;
    --qt-radius:      18px;
    --qt-radius-btn:  14px;
    --qt-transition:  all 0.25s ease;
}

body {
    background:
        radial-gradient(ellipse 80% 50% at 15% 10%, rgba(120,0,60,0.22) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 85% 80%, rgba(80,0,30,0.18) 0%, transparent 60%),
        linear-gradient(160deg, #03001c 0%, #07003a 50%, #02001a 100%) !important;
    background-attachment: fixed !important;
    min-height: 100vh;
}
#app, #main-content { background: transparent !important; }

/* force [hidden] to not be overridden by display rules */
[hidden] { display: none !important; }

/* ── Page wrapper ── */
.qt-page {
    min-height: calc(100vh - 70px);
    padding: 24px 20px 110px;
    max-width: 1400px;
    margin: 0 auto;
}

/* ── Header ── */
.qt-header {
    background: rgba(80, 55, 0, 0.22);
    border: 1px solid rgba(200, 160, 0, 0.30);
    border-top: 3px solid rgba(220, 170, 10, 0.65);
    border-radius: var(--qt-radius);
    padding: 18px 24px 14px;
    margin-bottom: 24px;
}
.qt-header-inner {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 12px; margin-bottom: 12px;
}
.qt-header-left { display: flex; align-items: center; gap: 14px; }
.qt-icon-wrap {
    width: 50px; height: 50px; border-radius: 14px;
    background: rgba(160, 120, 0, 0.25);
    border: 1px solid rgba(200, 160, 0, 0.40);
    display: grid; place-items: center;
    font-size: 1.5rem; color: var(--qt-gold); flex-shrink: 0;
}
.qt-label {
    font-size: 0.67rem; letter-spacing: 0.22em;
    text-transform: uppercase; color: var(--qt-text-muted); margin: 0 0 3px;
}
.qt-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1rem, 3vw, 1.5rem);
    font-weight: 700;
    background: linear-gradient(90deg, var(--qt-gold-light), var(--qt-gold), #e0a800);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    margin: 0;
}
.qt-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.qt-rate-badge {
    padding: 5px 14px; border-radius: 50px;
    background: rgba(160, 120, 0, 0.18);
    border: 1px solid rgba(200, 160, 0, 0.35);
    font-size: 0.75rem; color: var(--qt-gold);
    font-family: 'Rajdhani', sans-serif; font-weight: 600;
}
.qt-back-btn {
    display: flex; align-items: center; padding: 7px 16px;
    border-radius: var(--qt-radius-btn);
    background: rgba(180, 100, 0, 0.20);
    border: 1px solid rgba(220, 140, 0, 0.38);
    color: #ffcc66; font-family: 'Rajdhani', sans-serif;
    font-size: 0.88rem; font-weight: 600;
    text-decoration: none; transition: var(--qt-transition);
}
.qt-back-btn:hover {
    background: rgba(200, 120, 0, 0.30); color: #ffe499;
    border-color: rgba(255, 180, 0, 0.55); text-decoration: none;
}
.qt-reminder {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.79rem; color: var(--qt-text-muted);
    background: rgba(60, 40, 0, 0.22);
    border: 1px solid rgba(120, 90, 0, 0.28);
    border-radius: 9px; padding: 7px 13px;
}
.qt-reminder i { color: var(--qt-gold); flex-shrink: 0; }
.qt-reminder strong { color: #ffaa44; }
.qt-rem-submit { color: var(--qt-gold-light); font-weight: 600; }
.qt-reminder-bottom { margin: 0 0 22px; }

/* ── Grid ── */
.qt-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px; margin-bottom: 24px;
}
@media(min-width:576px){ .qt-grid{ grid-template-columns:repeat(3,1fr); } }
@media(min-width:768px){ .qt-grid{ grid-template-columns:repeat(4,1fr); gap:16px; } }
@media(min-width:1024px){ .qt-grid{ grid-template-columns:repeat(4,1fr); gap:16px; } }

/* ── Cards ── */
.qt-card {
    position: relative; border-radius: var(--qt-radius);
    background: rgba(30, 20, 0, 0.84);
    border: 1px solid rgba(160, 120, 0, 0.24);
    overflow: hidden; display: flex; flex-direction: column;
    transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
    animation: qtCardIn 0.45s cubic-bezier(.22,.68,0,1.2) both;
    animation-delay: calc(var(--card-i, 0) * 0.055s);
}
@keyframes qtCardIn {
    from { opacity: 0; transform: translateY(22px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0)    scale(1); }
}
.qt-card:hover {
    transform: translateY(-5px);
    border-color: rgba(220, 170, 0, 0.52);
    box-shadow: 0 8px 32px rgba(180, 130, 0, 0.22);
}
.qt-num-badge {
    position: absolute; top: 8px; left: 8px; z-index: 3;
    width: 34px; height: 34px; border-radius: 50%;
    background: linear-gradient(135deg, #7a5500, #3d2a00);
    border: 2px solid rgba(240, 190, 40, 0.70);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; color: var(--qt-gold-light);
    box-shadow: 0 0 10px rgba(200,150,0,0.35);
}
.qt-photo-wrap {
    position: relative; width: 100%;
    aspect-ratio: 3/4; overflow: hidden; background: #0d0800;
}
/* skeleton shimmer while image loads */
.qt-photo-skeleton {
    position: absolute; inset: 0; z-index: 1;
    background: linear-gradient(90deg,
        rgba(80,55,0,0.40) 25%,
        rgba(160,110,0,0.22) 50%,
        rgba(80,55,0,0.40) 75%);
    background-size: 200% 100%;
    animation: qtSkeleton 1.4s ease-in-out infinite;
}
@keyframes qtSkeleton {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
.qt-photo {
    position: relative; z-index: 2;
    width: 100%; height: 100%; object-fit: cover; display: block;
    opacity: 0;
    transition: opacity 0.45s ease, transform 0.35s ease;
    will-change: opacity, transform;
}
.qt-photo.loaded { opacity: 1; }
.qt-card:hover .qt-photo { transform: scale(1.05); }
.qt-photo-overlay {
    position: absolute; bottom: 0; left: 0; right: 0; height: 55%;
    background: linear-gradient(to top, rgba(10,6,0,0.95) 0%, transparent 100%);
    pointer-events: none;
}
.qt-crown-icon {
    position: absolute; bottom: 8px; right: 8px; z-index: 3;
    font-size: 1rem; color: var(--qt-gold);
    opacity: 0.70; filter: drop-shadow(0 0 5px rgba(200,160,0,0.60));
}
.qt-card-body {
    padding: 10px 12px 14px;
    display: flex; flex-direction: column; gap: 5px; flex: 1;
}
.qt-contestant-label {
    font-size: 0.60rem; letter-spacing: 0.18em;
    text-transform: uppercase; color: var(--qt-text-muted); margin: 0;
}
.qt-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600; font-size: 0.9rem;
    color: var(--qt-text); margin: 0 0 4px; line-height: 1.2;
}
.qt-score-wrap { margin-top: auto; }
.qt-score-label {
    display: flex; align-items: center;
    font-size: 0.68rem; color: var(--qt-gold);
    font-weight: 600; letter-spacing: 0.12em;
    text-transform: uppercase; margin-bottom: 4px;
}
/* hide native spinners */
.qt-score-input::-webkit-inner-spin-button,
.qt-score-input::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
.qt-stepper { display: flex; align-items: stretch; gap: 5px; }
.qt-score-input {
    flex: 1; min-width: 0;
    background: rgba(80, 55, 0, 0.25);
    border: 1px solid rgba(180, 135, 0, 0.45);
    border-radius: 9px; color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.15rem; font-weight: 700;
    text-align: center; padding: 7px 6px;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; -moz-appearance: textfield;
}
.qt-score-input:focus {
    border-color: rgba(220, 170, 0, 0.80);
    box-shadow: 0 0 14px rgba(200, 150, 0, 0.32); color: var(--qt-gold-light);
}
.qt-stepper-btns { display: flex; flex-direction: column; gap: 4px; flex-shrink: 0; }
.qt-step-btn {
    display: flex; align-items: center; justify-content: center;
    width: 28px; flex: 1;
    background: rgba(120,85,0,0.30);
    border: 1px solid rgba(200,155,0,0.45);
    border-radius: 7px; color: #f0c040;
    font-size: 0.70rem; cursor: pointer;
    transition: background 0.15s, color 0.15s, transform 0.12s, border-color 0.15s, box-shadow 0.15s;
    user-select: none; padding: 0; line-height: 1;
    touch-action: manipulation; -webkit-tap-highlight-color: transparent; outline: none;
}
.qt-stepper .qt-step-btn:hover {
    background: rgba(200,155,0,0.55) !important; color: #ffffff !important;
    border-color: rgba(240,195,30,0.85) !important;
    box-shadow: 0 0 10px rgba(220,175,0,0.50), inset 0 0 6px rgba(220,175,0,0.18) !important;
}
.qt-stepper .qt-step-btn:active {
    background: rgba(230,180,0,0.70) !important; color: #ffffff !important;
    border-color: rgba(255,215,0,0.95) !important;
    box-shadow: 0 0 16px rgba(230,180,0,0.70), inset 0 0 8px rgba(230,180,0,0.30) !important;
    transform: scale(0.88) !important;
}
.qt-stepper .qt-step-btn:focus-visible {
    outline: 2px solid rgba(240,195,30,0.85) !important; outline-offset: 2px;
}

/* ── Floating Buttons ── */
.floating-button {
    position: fixed; bottom: 24px; right: 24px;
    z-index: 1000; display: flex; gap: 10px;
    flex-direction: column; align-items: flex-end;
}
.qt-submit-btn {
    position: relative; display: flex; align-items: center;
    overflow: hidden; padding: 14px 32px; border-radius: 50px;
    background: linear-gradient(135deg, #c08000 0%, #7a5000 50%, #4d3200 100%);
    border: none;
    outline: 2px solid rgba(220, 170, 40, 0.55); outline-offset: 3px;
    color: #fff8dd; font-family: 'Orbitron', sans-serif;
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.10em; text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(160, 110, 0, 0.55);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.qt-submit-shimmer {
    position: absolute; top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,240,150,0.30) 50%, transparent 60%);
    animation: qtShimmer 2.8s ease-in-out infinite;
    pointer-events: none;
}
@keyframes qtShimmer { 0%{left:-75%} 60%,100%{left:130%} }
.qt-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px rgba(200, 150, 0, 0.65);
}
.qt-submit-btn:active { transform: scale(0.97); }
.qt-generate-btn {
    display: flex; align-items: center; padding: 9px 18px; border-radius: 50px;
    background: linear-gradient(135deg, #2a1d00, #1e1400);
    border: 1px solid rgba(140, 100, 0, 0.42); color: #e0b840;
    font-family: 'Rajdhani', sans-serif; font-size: 0.86rem; font-weight: 600;
    cursor: pointer; transition: var(--qt-transition);
}
.qt-generate-btn:hover { background: linear-gradient(135deg, #3a2800, #2a1d00); }
.qt-generate-btn:disabled { opacity: 0.55; cursor: not-allowed; pointer-events: none; }

/* ── Ranking Section ── */
.qt-rank-section { margin-top: 36px; padding-bottom: 40px; }
.qt-rank-card {
    background: rgba(22, 14, 0, 0.90);
    border: 1px solid rgba(180, 135, 0, 0.28);
    border-top: 3px solid rgba(200, 155, 0, 0.60);
    border-radius: var(--qt-radius); padding: 26px;
}
.qt-rank-header {
    font-family: 'Orbitron', sans-serif; font-size: 1.05rem;
    font-weight: 700; color: var(--qt-gold); margin-bottom: 5px;
}
.qt-rank-judge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem;
    color: var(--qt-text-muted); margin-bottom: 18px;
}
.qt-table { width: 100%; border-collapse: collapse; font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; }
.qt-table thead tr { background: rgba(100, 75, 0, 0.25); }
.qt-table th {
    padding: 11px 14px; text-align: center; color: var(--qt-gold);
    font-size: 0.76rem; letter-spacing: 0.13em; text-transform: uppercase;
    border-bottom: 1px solid rgba(180, 135, 0, 0.30);
}
.qt-table td {
    padding: 11px 14px; text-align: center;
    color: var(--qt-text); border-bottom: 1px solid rgba(80, 55, 0, 0.18);
}
.qt-table tbody tr:hover { background: rgba(100, 75, 0, 0.18); }
.qt-signature {
    display: flex; flex-direction: column; align-items: center;
    margin-top: 24px; gap: 5px;
}
.qt-sig-line {
    padding: 5px 28px;
    border-bottom: 2px solid rgba(200, 155, 0, 0.60);
    font-family: 'Orbitron', sans-serif; font-size: 0.82rem;
    color: var(--qt-text); letter-spacing: 0.08em;
}
.qt-sig-desc { font-size: 0.70rem; color: var(--qt-text-muted); letter-spacing: 0.14em; text-transform: uppercase; }
.qt-print-wrap { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-top: 20px; }
.qt-print-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(140, 100, 0, 0.22);
    border: 1px solid rgba(200, 155, 0, 0.42); color: var(--qt-gold-light);
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    cursor: pointer; transition: var(--qt-transition);
}
.qt-print-btn:hover { background: rgba(180, 135, 0, 0.32); }
.qt-home-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(30, 60, 100, 0.28);
    border: 1px solid rgba(80, 140, 220, 0.42); color: #aaccff;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    text-decoration: none; cursor: pointer; transition: var(--qt-transition);
}
.qt-home-btn:hover { background: rgba(40, 80, 140, 0.40); color: #cce0ff; text-decoration: none; }

/* ── Empty State ── */
.qt-empty-state {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; gap: 18px;
    padding: 64px 28px;
    background: rgba(40, 28, 0, 0.55);
    border: 2px dashed rgba(180, 135, 0, 0.35);
    border-radius: var(--qt-radius);
    text-align: center;
    animation: qtCardIn 0.55s ease both;
}
.qt-empty-icon {
    font-size: 3.5rem; color: rgba(200, 155, 0, 0.48);
    animation: qtEmptyPulse 2.4s ease-in-out infinite;
}
@keyframes qtEmptyPulse {
    0%,100% { opacity: 0.48; transform: scale(1);    }
    50%     { opacity: 0.85; transform: scale(1.10); }
}
.qt-empty-title {
    font-family: 'Orbitron', sans-serif; font-size: 1.15rem;
    font-weight: 700; color: var(--qt-gold); margin: 0;
}
.qt-empty-desc {
    font-family: 'Rajdhani', sans-serif; font-size: 0.95rem;
    color: var(--qt-text-muted); max-width: 440px; margin: 0; line-height: 1.6;
}
.qt-empty-back {
    display: inline-flex; align-items: center; padding: 9px 26px;
    border-radius: 50px;
    background: rgba(80, 55, 0, 0.35);
    border: 1px solid rgba(200, 155, 0, 0.42); color: var(--qt-gold-light);
    font-family: 'Rajdhani', sans-serif; font-size: 0.95rem; font-weight: 600;
    text-decoration: none; transition: var(--qt-transition);
}
.qt-empty-back:hover { background: rgba(130, 90, 0, 0.50); color: #fff8dd; text-decoration: none; }
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
            .qt-signature { margin-top:30px; display:flex; flex-direction:column; align-items:center; gap:6px; }
            .qt-sig-line { border-bottom:2px solid black; padding:0 30px; font-size:14px; }
            .qt-sig-desc { font-size:12px; }
            .qt-print-wrap { display:none; }
            .qt-rank-judge { font-size:18px; margin-bottom:20px; }
            .qt-rank-header { font-size:28px; margin-bottom:8px; }
            }</style></head>`
        );
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<script type="module">
    $(document).ready(function () {
        $("input[type=number]").on('focus', function () { this.select(); });
        function qtStepInput($input, dir) {
            const step = parseFloat($input.attr('step')) || 0.1, max = parseFloat($input.attr('max')) || 10, min = parseFloat($input.attr('min')) || 1;
            const next = Math.round((parseFloat($input.val()) + dir * step) * 10) / 10;
            if (next >= min && next <= max) $input.val(next.toFixed(1));
        }
        $(document).on('touchend click', '.qt-step-up', function (e) { e.preventDefault(); qtStepInput($(this).closest('.qt-stepper').find('input'), +1); });
        $(document).on('touchend click', '.qt-step-dn', function (e) { e.preventDefault(); qtStepInput($(this).closest('.qt-stepper').find('input'), -1); });

        $('#question-form').submit(function (event) {
            event.preventDefault();
            const $btn = $('.qt-submit-btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{ route('post_question_form') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Scores Saved!',
                        text: 'Snap Talk grading submitted successfully.',
                        background: 'rgba(20, 13, 0, 0.97)',
                        color: '#fff8e7',
                        iconColor: '#f5c842',
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(200,155,0,0.45)';
                            toast.style.boxShadow = '0 8px 32px rgba(160,110,0,0.40)';
                        }
                    });
                    $('#generate-rank').removeAttr('hidden');
                    loadRankings(true);
                    $btn.prop('disabled', false);
                },
                error: function (error) {
                    $btn.prop('disabled', false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Submission Failed',
                        text: error.responseJSON?.message ?? 'Please check your scores and try again.',
                        background: 'rgba(20, 13, 0, 0.97)',
                        color: '#fff8e7',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(220,50,80,0.50)';
                        }
                    });
                }
            });
        });

        $('#generate-rank').click(function (event) {
            event.preventDefault();
            $('#rank-table').empty();
            $('#generate-rank').prop('disabled', true);
            $.ajax({
                type: 'GET',
                url: '{{ route('rank_question') }}',
                success: function (response) {
                    $.each(response.ranking, function (key, value) {
                        var newRow = $(`
                            <tr>
                                <td>${value.ranking}</td>
                                <td>${value.contestant_number}</td>
                                <td>${value.contestant_name}</td>
                                <td>${value.score}</td>
                            </tr>`);
                        $('#rank-table').append(newRow);
                    });
                    document.getElementById('rank-table-container').removeAttribute('hidden');
                    var target = $('#rank-table-container').offset().top - 24;
                    $('html, body').animate({ scrollTop: target }, 1200, 'swing');
                },
                error: function (error) {
                    $('#generate-rank').prop('disabled', false);
                    console.error(error);
                }
            });
        });
    });
</script>
@endpush

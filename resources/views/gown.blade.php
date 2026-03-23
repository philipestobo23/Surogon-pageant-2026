@extends('layouts.app')

@section('content')

<div class="gown-page">

    {{-- ── Page Header ── --}}
    <div class="gown-header">
        <div class="gown-header-inner">
            <div class="gown-header-left">
                <div class="gown-icon-wrap">
                    <i class="bi bi-suit-heart-fill"></i>
                </div>
                <div>
                    <p class="gown-label">Coronation · Round 3</p>
                    <h2 class="gown-title">Gown Category</h2>
                </div>
            </div>
            <div class="gown-header-right">
                <span class="gown-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 – 10.0</span>
                <a href="{{ route('home') }}" class="gown-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
        <div class="gown-reminder">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="gown-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>
    </div>

    {{-- ── Contestant Grid ── --}}
    <form id="gown-form">
        @csrf
        <div class="gown-grid">
            @foreach($data as $key => $datum)
            <div class="gown-card" style="--card-i:{{ $loop->index }}">
                <div class="gown-num-badge">{{ $datum[0] }}</div>
                <div class="gown-photo-wrap">
                    <div class="gown-photo-skeleton"></div>
                    <img src="{{ asset('cons/' . $datum[0] . '.jpg') }}"
                         alt="Contestant {{ $datum[0] }}"
                         class="gown-photo"
                         loading="lazy"
                         decoding="async"
                         onload="this.classList.add('loaded');this.previousElementSibling.style.display='none';"
                         onerror="this.classList.add('loaded');this.previousElementSibling.style.display='none';this.src='{{ asset('images/surigay_logo.png') }}';">
                    <div class="gown-photo-overlay"></div>
                </div>
                <div class="gown-card-body">
                    <p class="gown-contestant-label">Contestant</p>
                    <p class="gown-contestant-name">{{ $datum[1] }}</p>
                    <div class="gown-score-wrap">
                        <label class="gown-score-label"><i class="bi bi-pen-fill me-1"></i>Score</label>
                        <input class="gown-score-input" type="number" step="0.1" min="1" max="10"
                               value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="gown-reminder gown-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="gown-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="gown-submit-btn">
                <span class="gown-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" class="gown-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>

    {{-- ── Ranking Table ── --}}
    <div id="rank-table-container" class="gown-rank-section" hidden>
        <div class="gown-rank-card">
            <div class="gown-rank-header"><i class="bi bi-trophy-fill me-2"></i>Gown Rankings</div>
            <p class="gown-rank-judge"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->RealName ?? Auth::user()->name }}</p>
            <div class="table-responsive">
                <table class="gown-table">
                    <thead><tr><th>Rank</th><th>No.</th><th>Contestant Name</th><th>Score</th></tr></thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="gown-signature">
                <div class="gown-sig-line">{{ Auth::user()->name }} — {{ Auth::user()->RealName }}</div>
                <div class="gown-sig-desc">Judge's Signature</div>
            </div>
            <div class="gown-print-wrap gown-print">
                <button class="gown-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
                <a href="{{ route('home') }}" class="gown-home-btn">
                    <i class="bi bi-house-fill me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>

</div>

<style>
:root {
    --text-primary:   #f0ebff;
    --text-secondary: #a89acc;
    --radius-card:    18px;
    --radius-btn:     14px;
    --transition:     all 0.25s ease;
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

.gown-page {
    min-height: calc(100vh - 70px);
    padding: 24px 20px 100px;
    max-width: 1400px;
    margin: 0 auto;
}
.gown-header {
    background: rgba(120,0,60,0.18);
    border: 1px solid rgba(200,0,100,0.28);
    border-radius: var(--radius-card);
    padding: 18px 24px 14px;
    margin-bottom: 24px;
    border-top: 3px solid rgba(200,0,120,0.60);
}
.gown-header-inner {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 12px; margin-bottom: 12px;
}
.gown-header-left { display: flex; align-items: center; gap: 14px; }
.gown-icon-wrap {
    width: 48px; height: 48px; border-radius: 13px;
    background: rgba(160,0,80,0.22);
    border: 1px solid rgba(200,0,100,0.35);
    display: grid; place-items: center;
    font-size: 1.4rem; color: #dd4488; flex-shrink: 0;
}
.gown-label {
    font-size: 0.67rem; letter-spacing: 0.20em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0 0 3px;
}
.gown-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1rem, 3vw, 1.45rem);
    font-weight: 700; color: var(--text-primary); margin: 0;
}
.gown-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.gown-rate-badge {
    padding: 5px 13px; border-radius: 50px;
    background: rgba(160,0,80,0.18);
    border: 1px solid rgba(200,0,100,0.32);
    font-size: 0.75rem; color: #ff55aa;
    font-family: 'Rajdhani', sans-serif; font-weight: 600;
}
.gown-back-btn {
    display: flex; align-items: center; padding: 7px 16px;
    border-radius: var(--radius-btn);
    background: rgba(200,30,80,0.20);
    border: 1px solid rgba(230,60,100,0.38);
    color: #ff88aa; font-family: 'Rajdhani', sans-serif;
    font-size: 0.88rem; font-weight: 600;
    text-decoration: none; transition: var(--transition);
}
.gown-back-btn:hover {
    background: rgba(220,30,80,0.32); color: #ffaabb;
    border-color: rgba(255,60,110,0.60); text-decoration: none;
}
.gown-reminder {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.79rem; color: var(--text-secondary);
    background: rgba(80,0,40,0.18);
    border: 1px solid rgba(140,0,70,0.22);
    border-radius: 9px; padding: 7px 13px;
}
.gown-reminder i { color: #dd4488; flex-shrink: 0; }
.gown-reminder strong { color: #ff9966; }
.gown-rem-submit { color: #ff66aa; font-weight: 600; }
.gown-reminder-bottom { margin: 0 0 22px; }
.gown-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px; margin-bottom: 24px;
}
@media(min-width:576px){ .gown-grid{ grid-template-columns:repeat(3,1fr); } }
@media(min-width:768px){ .gown-grid{ grid-template-columns:repeat(4,1fr); gap:16px; } }
@media(min-width:1024px){ .gown-grid{ grid-template-columns:repeat(7,1fr); gap:14px; } }
.gown-card {
    position: relative; border-radius: var(--radius-card);
    background: rgba(48, 4, 18, 0.82);
    border: 1px solid rgba(180,0,90,0.22);
    overflow: hidden; display: flex; flex-direction: column;
    transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
    animation: gownCardIn 0.45s cubic-bezier(.22,.68,0,1.2) both;
    animation-delay: calc(var(--card-i, 0) * 0.055s);
}
@keyframes gownCardIn {
    from { opacity: 0; transform: translateY(22px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0)    scale(1); }
}
.gown-card:hover {
    transform: translateY(-4px);
    border-color: rgba(220,0,110,0.45);
    box-shadow: 0 6px 28px rgba(160,0,80,0.18);
}
.gown-num-badge {
    position: absolute; top: 8px; left: 8px; z-index: 3;
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg, #660033, #3d001f);
    border: 2px solid rgba(220,80,130,0.65);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; color: #fff;
}
.gown-photo-wrap {
    position: relative; width: 100%;
    aspect-ratio: 3/4; overflow: hidden; background: #100408;
}
/* skeleton shimmer while image loads */
.gown-photo-skeleton {
    position: absolute; inset: 0; z-index: 1;
    background: linear-gradient(90deg,
        rgba(80,0,40,0.35) 25%,
        rgba(160,0,80,0.22) 50%,
        rgba(80,0,40,0.35) 75%);
    background-size: 200% 100%;
    animation: gownSkeleton 1.4s ease-in-out infinite;
}
@keyframes gownSkeleton {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
.gown-photo {
    position: relative; z-index: 2;
    width: 100%; height: 100%; object-fit: cover; display: block;
    opacity: 0;
    transition: opacity 0.45s ease, transform 0.35s ease;
    will-change: opacity, transform;
}
.gown-photo.loaded { opacity: 1; }
.gown-card:hover .gown-photo { transform: scale(1.04); }
.gown-photo-overlay {
    position: absolute; bottom: 0; left: 0; right: 0; height: 50%;
    background: linear-gradient(to top, rgba(12,2,6,0.90) 0%, transparent 100%);
    pointer-events: none;
}
.gown-card-body {
    padding: 10px 12px 13px;
    display: flex; flex-direction: column; gap: 5px; flex: 1;
}
.gown-contestant-label {
    font-size: 0.62rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0;
}
.gown-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600; font-size: 0.88rem;
    color: var(--text-primary); margin: 0 0 4px; line-height: 1.2;
}
.gown-score-wrap { margin-top: auto; }
.gown-score-label {
    display: flex; align-items: center;
    font-size: 0.68rem; color: #ff55aa;
    font-weight: 600; letter-spacing: 0.10em;
    text-transform: uppercase; margin-bottom: 4px;
}
.gown-score-input {
    width: 100%;
    background: rgba(100,0,50,0.22);
    border: 1px solid rgba(180,0,90,0.42);
    border-radius: 9px; color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.15rem; font-weight: 700;
    text-align: center; padding: 7px 8px;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; -moz-appearance: textfield;
}
.gown-score-input::-webkit-inner-spin-button,
.gown-score-input::-webkit-outer-spin-button { -webkit-appearance: none; }
.gown-score-input:focus {
    border-color: rgba(220,0,110,0.75);
    box-shadow: 0 0 12px rgba(200,0,100,0.28); color: #ffaacc;
}
.floating-button {
    position: fixed; bottom: 24px; right: 24px;
    z-index: 1000; display: flex; gap: 10px;
    flex-direction: column; align-items: flex-end;
}
.gown-submit-btn {
    position: relative; display: flex; align-items: center;
    overflow: hidden; padding: 14px 32px; border-radius: 50px;
    background: linear-gradient(135deg, #cc0066 0%, #770033 50%, #4d0022 100%);
    border: none;
    outline: 2px solid rgba(220,80,130,0.50); outline-offset: 3px;
    color: #fff; font-family: 'Orbitron', sans-serif;
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.10em; text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(180,0,80,0.50);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.gown-submit-shimmer {
    position: absolute; top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.26) 50%, transparent 60%);
    animation: gownShimmer 2.6s ease-in-out infinite;
    pointer-events: none;
}
@keyframes gownShimmer { 0%{left:-75%} 60%,100%{left:130%} }
.gown-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px rgba(200,0,90,0.65);
}
.gown-submit-btn:active { transform: scale(0.97); }
.gown-generate-btn {
    display: flex; align-items: center; padding: 9px 18px; border-radius: 50px;
    background: linear-gradient(135deg, #440033, #330022);
    border: 1px solid rgba(160,0,200,0.42); color: #ff66cc;
    font-family: 'Rajdhani', sans-serif; font-size: 0.86rem; font-weight: 600;
    cursor: pointer; transition: var(--transition);
}
.gown-generate-btn:hover { background: linear-gradient(135deg, #550044, #440033); }
.gown-rank-section { margin-top: 36px; padding-bottom: 40px; }
.gown-rank-card {
    background: rgba(48, 4, 18, 0.88);
    border: 1px solid rgba(200,0,100,0.26);
    border-top: 3px solid rgba(200,0,100,0.55);
    border-radius: var(--radius-card); padding: 26px;
}
.gown-rank-header {
    font-family: 'Orbitron', sans-serif; font-size: 1.05rem;
    font-weight: 700; color: #ff55aa; margin-bottom: 5px;
}
.gown-rank-judge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem;
    color: var(--text-secondary); margin-bottom: 18px;
}
.gown-table { width: 100%; border-collapse: collapse; font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; }
.gown-table thead tr { background: rgba(120,0,60,0.22); }
.gown-table th {
    padding: 11px 14px; text-align: center; color: #ff55aa;
    font-size: 0.76rem; letter-spacing: 0.13em; text-transform: uppercase;
    border-bottom: 1px solid rgba(200,0,100,0.28);
}
.gown-table td {
    padding: 11px 14px; text-align: center;
    color: var(--text-primary); border-bottom: 1px solid rgba(100,0,50,0.15);
}
.gown-table tbody tr:hover { background: rgba(120,0,60,0.18); }
.gown-signature {
    display: flex; flex-direction: column; align-items: center;
    margin-top: 24px; gap: 5px;
}
.gown-sig-line {
    padding: 5px 26px;
    border-bottom: 2px solid rgba(200,80,130,0.55);
    font-family: 'Orbitron', sans-serif; font-size: 0.82rem;
    color: var(--text-primary); letter-spacing: 0.08em;
}
.gown-sig-desc { font-size: 0.70rem; color: var(--text-secondary); letter-spacing: 0.14em; text-transform: uppercase; }
.gown-print-wrap { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-top: 20px; }
.gown-print-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(180,140,0,0.22);
    border: 1px solid rgba(220,180,0,0.42); color: #ffe066;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    cursor: pointer; transition: var(--transition);
}
.gown-print-btn:hover { background: rgba(200,160,0,0.32); }
.gown-home-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(30, 60, 100, 0.28);
    border: 1px solid rgba(80, 140, 220, 0.42); color: #aaccff;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    text-decoration: none; cursor: pointer; transition: var(--transition);
}
.gown-home-btn:hover { background: rgba(40, 80, 140, 0.40); color: #cce0ff; text-decoration: none; }
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
            .gown-signature { margin-top:30px; display:flex; flex-direction:column; align-items:center; gap:6px; }
            .gown-sig-line { border-bottom:2px solid black; padding:0 30px; font-size:14px; }
            .gown-sig-desc { font-size:12px; }
            .gown-print-wrap { display:none; }
            .gown-rank-judge { font-size:18px; margin-bottom:20px; }
            .gown-rank-header { font-size:28px; margin-bottom:8px; }
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

        $('#gown-form').submit(function (event) {
            event.preventDefault();
            const $btn = $('.gown-submit-btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{ route('post_gown_form') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Scores Saved!',
                        text: 'Gown grading submitted successfully.',
                        background: 'rgba(48, 4, 18, 0.97)',
                        color: '#ffccdd',
                        iconColor: '#ff55aa',
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(200,0,100,0.45)';
                            toast.style.boxShadow = '0 8px 32px rgba(180,0,80,0.40)';
                        }
                    });
                    $('#generate-rank').trigger('click');
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
                        background: 'rgba(48, 4, 18, 0.97)',
                        color: '#ffccdd',
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
            $.ajax({
                type: 'GET',
                url: '{{ route('rank_gown') }}',
                success: function (response) {
                    $.each(response.ranking, function (key, value) {
                        $('#rank-table').append(`<tr><td>${value.ranking}</td><td>${value.contestant_number}</td><td>${value.contestant_name}</td><td>${value.score}</td></tr>`);
                    });
                    document.getElementById('rank-table-container').removeAttribute('hidden');
                    var target = $('#rank-table-container').offset().top - 24;
                    $('html, body').animate({ scrollTop: target }, 1200, 'swing');
                },
                error: function (error) { console.error(error); }
            });
        });
    });
</script>
@endpush

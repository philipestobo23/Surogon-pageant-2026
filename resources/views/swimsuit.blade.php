@extends('layouts.app')

@section('content')

<div class="sw-page">

    {{-- â”€â”€ Page Header â”€â”€ --}}
    <div class="sw-header">
        <div class="sw-header-inner">
            <div class="sw-header-left">
                <div class="sw-icon-wrap">
                    <i class="bi bi-hearts"></i>
                </div>
                <div>
                    <p class="sw-label">Top 10 Selection Â· Round 1</p>
                    <h2 class="sw-title">Swimwear Category</h2>
                </div>
            </div>
            <div class="sw-header-right">
                <span class="sw-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 - 10.0</span>
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

    {{-- â”€â”€ Contestant Grid â”€â”€ --}}
    <form id="swimsuit-form">
        @csrf
        <div class="sw-grid">
            @foreach($data as $key => $datum)
            <div class="sw-card" style="--card-i:{{ $loop->index }}">
                <div class="sw-num-badge">{{ $datum[0] }}</div>
                <div class="sw-photo-wrap">
                    <div class="sw-photo-skeleton"></div>
                    <img src="{{ asset('cons/' . $datum[0] . '.webp') }}"
                         alt="Contestant {{ $datum[0] }}"
                         class="sw-photo"
                         loading="lazy"
                         decoding="async"
                         onload="this.classList.add('loaded');this.previousElementSibling.style.display='none';"
                         onerror="this.classList.add('loaded');this.previousElementSibling.style.display='none';this.src='{{ asset('images/KS1.png') }}';">
                    <div class="sw-photo-overlay"></div>
                </div>
                <div class="sw-card-body">
                    <p class="sw-contestant-label">Contestant</p>
                    <p class="sw-contestant-name">{{ $datum[1] }}</p>
                    <div class="sw-score-wrap">
                        <label class="sw-score-label"><i class="bi bi-pen-fill me-1"></i>Score</label>
                        <input class="sw-score-input" type="number" step="0.1" min="1" max="10"
                               value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="sw-reminder sw-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="sw-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="sw-submit-btn">
                <span class="sw-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" class="sw-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>

    {{-- â”€â”€ Ranking Table â”€â”€ --}}
    <div id="rank-table-container" class="sw-rank-section" hidden>
        <div class="sw-rank-card">
            <div class="sw-rank-header"><i class="bi bi-trophy-fill me-2"></i>Swimwear Rankings</div>
            <p class="sw-rank-judge"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->RealName ?? Auth::user()->name }}</p>
            <div class="table-responsive">
                <table class="sw-table">
                    <thead><tr><th>Rank</th><th>No.</th><th>Contestant Name</th><th>Score</th></tr></thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="sw-signature">
                <div class="sw-sig-line">{{ Auth::user()->name }} - {{ Auth::user()->RealName }}</div>
                <div class="sw-sig-desc">Judge's Signature</div>
            </div>
            <div class="sw-print-wrap swim-print">
                <button class="sw-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
                <a href="{{ route('home') }}" class="sw-home-btn">
                    <i class="bi bi-house-fill me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>

</div>

<style>
:root {
    --cosmos-surface: rgba(15, 8, 55, 0.80);
    --cosmos-border:  rgba(140, 70, 255, 0.28);
    --text-primary:   #f0ebff;
    --text-secondary: #a89acc;
    --radius-card:    18px;
    --radius-btn:     14px;
    --transition:     all 0.25s ease;
}

/* â”€â”€ lightweight static background â”€â”€ */
body {
    background:
        radial-gradient(ellipse 80% 50% at 20% 10%, rgba(80,0,200,0.28) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 80% 80%, rgba(30,0,120,0.22) 0%, transparent 60%),
        linear-gradient(160deg, #03001c 0%, #07003a 50%, #02001a 100%) !important;
    background-attachment: fixed !important;
    min-height: 100vh;
}
#app, #main-content { background: transparent !important; }

/* force [hidden] to not be overridden by display rules */
[hidden] { display: none !important; }

/* â”€â”€ page â”€â”€ */
.sw-page {
    min-height: calc(100vh - 70px);
    padding: 24px 20px 100px;
    max-width: 1400px;
    margin: 0 auto;
}

/* â”€â”€ header â”€â”€ */
.sw-header {
    background: rgba(0,120,180,0.18);
    border: 1px solid rgba(0,190,230,0.28);
    border-radius: var(--radius-card);
    padding: 18px 24px 14px;
    margin-bottom: 24px;
    border-top: 3px solid rgba(0,200,240,0.60);
}
.sw-header-inner {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 12px; margin-bottom: 12px;
}
.sw-header-left { display: flex; align-items: center; gap: 14px; }

.sw-icon-wrap {
    width: 48px; height: 48px;
    border-radius: 13px;
    background: rgba(0,170,200,0.22);
    border: 1px solid rgba(0,200,240,0.35);
    display: grid; place-items: center;
    font-size: 1.4rem; color: #33ddee;
    flex-shrink: 0;
}
.sw-label {
    font-size: 0.67rem; letter-spacing: 0.20em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0 0 3px;
}
.sw-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1rem, 3vw, 1.45rem);
    font-weight: 700; color: var(--text-primary); margin: 0;
}
.sw-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

.sw-rate-badge {
    padding: 5px 13px; border-radius: 50px;
    background: rgba(0,170,200,0.18);
    border: 1px solid rgba(0,200,240,0.32);
    font-size: 0.75rem; color: #55eeff;
    font-family: 'Rajdhani', sans-serif; font-weight: 600;
}
.sw-back-btn {
    display: flex; align-items: center;
    padding: 7px 16px; border-radius: var(--radius-btn);
    background: rgba(200,30,80,0.20);
    border: 1px solid rgba(230,60,100,0.38);
    color: #ff88aa;
    font-family: 'Rajdhani', sans-serif; font-size: 0.88rem; font-weight: 600;
    text-decoration: none; transition: var(--transition);
}
.sw-back-btn:hover {
    background: rgba(220,30,80,0.32); color: #ffaabb;
    border-color: rgba(255,60,110,0.60); text-decoration: none;
}
.sw-reminder {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.79rem; color: var(--text-secondary);
    background: rgba(80,30,160,0.18);
    border: 1px solid rgba(120,60,220,0.22);
    border-radius: 9px; padding: 7px 13px;
}
.sw-reminder i { color: #aa77ff; flex-shrink: 0; }
.sw-reminder strong { color: #ff9966; }
.sw-rem-submit { color: #66ccff; font-weight: 600; }
.sw-reminder-bottom { margin: 0 0 22px; }

/* â”€â”€ grid â”€â”€ */
.sw-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px; margin-bottom: 24px;
}
@media(min-width:576px){ .sw-grid{ grid-template-columns:repeat(3,1fr); } }
@media(min-width:768px){ .sw-grid{ grid-template-columns:repeat(4,1fr); gap:16px; } }
@media(min-width:1024px){ .sw-grid{ grid-template-columns:repeat(7,1fr); gap:14px; } }

/* â”€â”€ card â”€â”€ */
.sw-card {
    position: relative;
    border-radius: var(--radius-card);
    background: rgba(10, 4, 48, 0.82);
    border: 1px solid rgba(0,190,230,0.22);
    overflow: hidden;
    display: flex; flex-direction: column;
    transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
    animation: swCardIn 0.45s cubic-bezier(.22,.68,0,1.2) both;
    animation-delay: calc(var(--card-i, 0) * 0.055s);
}
@keyframes swCardIn {
    from { opacity: 0; transform: translateY(22px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0)    scale(1); }
}
.sw-card:hover {
    transform: translateY(-4px);
    border-color: rgba(0,220,255,0.45);
    box-shadow: 0 6px 28px rgba(0,160,220,0.18);
}
.sw-num-badge {
    position: absolute; top: 8px; left: 8px; z-index: 3;
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg,#0055cc,#003888);
    border: 2px solid rgba(80,160,255,0.65);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; color: #fff;
}
.sw-photo-wrap {
    position: relative; width: 100%;
    aspect-ratio: 3/4; overflow: hidden; background: #08002a;
}
/* skeleton shimmer while image loads */
.sw-photo-skeleton {
    position: absolute; inset: 0; z-index: 1;
    background: linear-gradient(90deg,
        rgba(0,60,120,0.38) 25%,
        rgba(0,140,200,0.22) 50%,
        rgba(0,60,120,0.38) 75%);
    background-size: 200% 100%;
    animation: swSkeleton 1.4s ease-in-out infinite;
}
@keyframes swSkeleton {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
.sw-photo {
    position: relative; z-index: 2;
    width:100%; height:100%; object-fit:cover; display:block;
    opacity: 0;
    transition: opacity 0.45s ease, transform 0.35s ease;
    will-change: opacity, transform;
}
.sw-photo.loaded { opacity: 1; }
.sw-card:hover .sw-photo { transform: scale(1.04); }
.sw-photo-overlay {
    position: absolute; bottom:0; left:0; right:0; height:50%;
    background: linear-gradient(to top, rgba(6,0,36,0.90) 0%, transparent 100%);
    pointer-events: none;
}
.sw-card-body {
    padding: 10px 12px 13px;
    display: flex; flex-direction: column; gap: 5px; flex: 1;
}
.sw-contestant-label {
    font-size: 0.62rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0;
}
.sw-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600; font-size: 0.88rem;
    color: var(--text-primary); margin: 0 0 4px; line-height: 1.2;
}
.sw-score-wrap { margin-top: auto; }
.sw-score-label {
    display: flex; align-items: center;
    font-size: 0.68rem; color: #55ccee;
    font-weight: 600; letter-spacing: 0.10em;
    text-transform: uppercase; margin-bottom: 4px;
}
.sw-score-input {
    width: 100%;
    background: rgba(0,100,160,0.22);
    border: 1px solid rgba(0,180,220,0.42);
    border-radius: 9px; color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.15rem; font-weight: 700;
    text-align: center; padding: 7px 8px;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; -moz-appearance: textfield;
}
.sw-score-input::-webkit-inner-spin-button,
.sw-score-input::-webkit-outer-spin-button { -webkit-appearance: none; }
.sw-score-input:focus {
    border-color: rgba(0,220,255,0.75);
    box-shadow: 0 0 12px rgba(0,200,240,0.28); color: #aaf0ff;
}

/* â”€â”€ floating buttons â”€â”€ */
.floating-button {
    position: fixed; bottom: 24px; right: 24px;
    z-index: 1000; display: flex; gap: 10px;
    flex-direction: column; align-items: flex-end;
}
.sw-submit-btn {
    position: relative; display: flex; align-items: center;
    overflow: hidden; padding: 14px 32px; border-radius: 50px;
    background: linear-gradient(135deg, #00aaff 0%, #0055dd 50%, #6600ff 100%);
    border: none;
    outline: 2px solid rgba(100,180,255,0.50); outline-offset: 3px;
    color: #fff; font-family: 'Orbitron', sans-serif;
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.10em; text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(0,110,255,0.50);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.sw-submit-shimmer {
    position: absolute; top:0; left:-75%;
    width:50%; height:100%;
    background: linear-gradient(105deg,transparent 40%,rgba(255,255,255,0.26) 50%,transparent 60%);
    animation: submitShimmer 2.6s ease-in-out infinite;
    pointer-events: none;
}
@keyframes submitShimmer { 0%{left:-75%} 60%,100%{left:130%} }
.sw-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px rgba(0,140,255,0.65);
}
.sw-submit-btn:active { transform: scale(0.97); }

.sw-generate-btn {
    display: flex; align-items: center; padding: 9px 18px; border-radius: 50px;
    background: linear-gradient(135deg,#007755,#004433);
    border: 1px solid rgba(0,200,140,0.42); color: #aaffdd;
    font-family: 'Rajdhani', sans-serif; font-size: 0.86rem; font-weight: 600;
    cursor: pointer; transition: var(--transition);
}
.sw-generate-btn:hover { background: linear-gradient(135deg,#009966,#006644); }

/* â”€â”€ ranking section â”€â”€ */
.sw-rank-section { margin-top: 36px; padding-bottom: 40px; }
.sw-rank-card {
    background: rgba(10,4,50,0.88);
    border: 1px solid rgba(0,200,240,0.26);
    border-top: 3px solid rgba(0,200,240,0.55);
    border-radius: var(--radius-card);
    padding: 26px;
}
.sw-rank-header {
    font-family: 'Orbitron', sans-serif; font-size: 1.05rem;
    font-weight: 700; color: #55eeff; margin-bottom: 5px;
}
.sw-rank-judge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem;
    color: var(--text-secondary); margin-bottom: 18px;
}
.sw-table { width:100%; border-collapse:collapse; font-family:'Rajdhani',sans-serif; font-size:0.93rem; }
.sw-table thead tr { background: rgba(0,120,180,0.22); }
.sw-table th {
    padding:11px 14px; text-align:center; color:#55eeff;
    font-size:0.76rem; letter-spacing:0.13em; text-transform:uppercase;
    border-bottom:1px solid rgba(0,190,230,0.28);
}
.sw-table td {
    padding:11px 14px; text-align:center;
    color:var(--text-primary); border-bottom:1px solid rgba(100,50,200,0.12);
}
.sw-table tbody tr:hover { background: rgba(0,100,160,0.15); }
.sw-signature {
    display:flex; flex-direction:column; align-items:center;
    margin-top:24px; gap:5px;
}
.sw-sig-line {
    padding:5px 26px;
    border-bottom:2px solid rgba(180,150,255,0.55);
    font-family:'Orbitron',sans-serif; font-size:0.82rem;
    color:var(--text-primary); letter-spacing:0.08em;
}
.sw-sig-desc { font-size:0.70rem; color:var(--text-secondary); letter-spacing:0.14em; text-transform:uppercase; }
.sw-print-wrap { display:flex; justify-content:center; gap: 10px; flex-wrap: wrap; margin-top:20px; }
.sw-print-btn {
    display:flex; align-items:center; padding:9px 26px; border-radius:50px;
    background: rgba(180,140,0,0.22);
    border:1px solid rgba(220,180,0,0.42); color:#ffe066;
    font-family:'Rajdhani',sans-serif; font-size:0.93rem; font-weight:600;
    cursor:pointer; transition:var(--transition);
}
.sw-print-btn:hover { background:rgba(200,160,0,0.32); }
.sw-home-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(30, 60, 100, 0.28);
    border: 1px solid rgba(80, 140, 220, 0.42); color: #aaccff;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    text-decoration: none; cursor: pointer; transition: var(--transition);
}
.sw-home-btn:hover { background: rgba(40, 80, 140, 0.40); color: #cce0ff; text-decoration: none; }
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
</script>
<script type="module">
    $(document).ready(function () {
        $("input[type=number]").on('focus', function () { this.select(); });

        $('#swimsuit-form').submit(function (event) {
            event.preventDefault();
            const $btn = $('.sw-submit-btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{ route('post_swimsuit_form') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Scores Saved!',
                        text: 'Swimwear grading submitted successfully.',
                        background: 'rgba(4, 8, 48, 0.97)',
                        color: '#ccf0ff',
                        iconColor: '#33ddee',
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(0,190,230,0.45)';
                            toast.style.boxShadow = '0 8px 32px rgba(0,160,220,0.40)';
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
                        background: 'rgba(4, 8, 48, 0.97)',
                        color: '#ccf0ff',
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
                url: '{{ route('rank_swimsuit') }}',
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

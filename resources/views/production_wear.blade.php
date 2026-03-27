@extends('layouts.app')

@section('content')

<div class="pw-page">

    {{-- ── Page Header ── --}}
    <div class="pw-header">
        <div class="pw-header-inner">
            <div class="pw-header-left">
                <div class="pw-icon-wrap">
                    <i class="bi bi-flag-fill"></i>
                </div>
                <div>
                    <p class="pw-label">Coronation · Round 2</p>
                    <h2 class="pw-title">Filipiniana Wear Category</h2>
                </div>
            </div>
            <div class="pw-header-right">
                <span class="pw-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 – 10.0</span>
                <a href="{{ route('home') }}" class="pw-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
        <div class="pw-reminder">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="pw-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>
    </div>

    {{-- ── Contestant Grid ── --}}
    <form id="production_wear-form" hx-boost="false">
        @csrf
        <div class="pw-grid">
            @foreach($data as $key => $datum)
            <div class="pw-card">
                <div class="pw-num-badge">{{ $datum[0] }}</div>
                <div class="pw-photo-wrap">
                    <img src="{{ asset('cons/' . $datum[0] . '.webp') }}"
                         alt="Contestant {{ $datum[0] }}"
                         class="pw-photo"
                         loading="lazy"
                         onerror="this.src='{{ asset('images/KS1.png') }}'">
                    <div class="pw-photo-overlay"></div>
                </div>
                <div class="pw-card-body">
                    <p class="pw-contestant-label">Contestant</p>
                    <p class="pw-contestant-name">{{ $datum[1] }}</p>
                    <div class="pw-score-wrap">
                        <label class="pw-score-label"><i class="bi bi-pen-fill me-1"></i>Score</label>
                        <div class="pw-stepper">
                            <input class="pw-score-input" type="number" step="0.1" min="1" max="10"
                                   value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                            <div class="pw-stepper-btns">
                                <button type="button" class="pw-step-btn pw-step-up" tabindex="-1"><i class="bi bi-chevron-up"></i></button>
                                <button type="button" class="pw-step-btn pw-step-dn" tabindex="-1"><i class="bi bi-chevron-down"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pw-reminder pw-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="pw-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="pw-submit-btn">
                <span class="pw-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" type="button" class="pw-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>

    {{-- ── Ranking Table ── --}}
    <div id="rank-table-container" class="pw-rank-section" hidden>
        <div class="pw-rank-card">
            <div class="pw-rank-header"><i class="bi bi-trophy-fill me-2"></i>Filipiniana Wear Rankings</div>
            <p class="pw-rank-judge"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->RealName ?? Auth::user()->name }}</p>
            <div class="table-responsive">
                <table class="pw-table">
                    <thead><tr><th>Rank</th><th>No.</th><th>Contestant Name</th><th>Score</th></tr></thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="pw-signature">
                <div class="pw-sig-line">{{ Auth::user()->name }} — {{ Auth::user()->RealName }}</div>
                <div class="pw-sig-desc">Judge's Signature</div>
            </div>
            <div class="pw-print-wrap pw-print">
                <button class="pw-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
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

/* ── lightweight static background ── */
body {
    background:
        radial-gradient(ellipse 80% 50% at 15% 10%, rgba(80,0,200,0.22) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 85% 80%, rgba(50,0,140,0.18) 0%, transparent 60%),
        linear-gradient(160deg, #03001c 0%, #07003a 50%, #02001a 100%) !important;
    background-attachment: fixed !important;
    min-height: 100vh;
}
#app, #main-content { background: transparent !important; }

/* ── page ── */
.pw-page {
    min-height: calc(100vh - 70px);
    padding: 24px 20px 100px;
    max-width: 1400px;
    margin: 0 auto;
}

/* ── header ── */
.pw-header {
    background: rgba(60,0,160,0.18);
    border: 1px solid rgba(140,0,255,0.28);
    border-radius: var(--radius-card);
    padding: 18px 24px 14px;
    margin-bottom: 24px;
    border-top: 3px solid rgba(160,0,255,0.60);
}
.pw-header-inner {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 12px; margin-bottom: 12px;
}
.pw-header-left { display: flex; align-items: center; gap: 14px; }
.pw-icon-wrap {
    width: 48px; height: 48px; border-radius: 13px;
    background: rgba(100,0,200,0.22);
    border: 1px solid rgba(140,0,255,0.35);
    display: grid; place-items: center;
    font-size: 1.4rem; color: #aa55ff; flex-shrink: 0;
}
.pw-label {
    font-size: 0.67rem; letter-spacing: 0.20em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0 0 3px;
}
.pw-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1rem, 3vw, 1.45rem);
    font-weight: 700; color: var(--text-primary); margin: 0;
}
.pw-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.pw-rate-badge {
    padding: 5px 13px; border-radius: 50px;
    background: rgba(100,0,200,0.18);
    border: 1px solid rgba(140,0,255,0.32);
    font-size: 0.75rem; color: #cc88ff;
    font-family: 'Rajdhani', sans-serif; font-weight: 600;
}
.pw-back-btn {
    display: flex; align-items: center; padding: 7px 16px;
    border-radius: var(--radius-btn);
    background: rgba(200,30,80,0.20);
    border: 1px solid rgba(230,60,100,0.38);
    color: #ff88aa; font-family: 'Rajdhani', sans-serif;
    font-size: 0.88rem; font-weight: 600;
    text-decoration: none; transition: var(--transition);
}
.pw-back-btn:hover {
    background: rgba(220,30,80,0.32); color: #ffaabb;
    border-color: rgba(255,60,110,0.60); text-decoration: none;
}
.pw-reminder {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.79rem; color: var(--text-secondary);
    background: rgba(60,0,140,0.18);
    border: 1px solid rgba(120,0,220,0.22);
    border-radius: 9px; padding: 7px 13px;
}
.pw-reminder i { color: #aa55ff; flex-shrink: 0; }
.pw-reminder strong { color: #ff9966; }
.pw-rem-submit { color: #cc88ff; font-weight: 600; }
.pw-reminder-bottom { margin: 0 0 22px; }

/* ── grid ── */
.pw-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px; margin-bottom: 24px;
}
@media(min-width:576px){ .pw-grid{ grid-template-columns:repeat(3,1fr); } }
@media(min-width:768px){ .pw-grid{ grid-template-columns:repeat(4,1fr); gap:16px; } }
@media(min-width:1024px){ .pw-grid{ grid-template-columns:repeat(7,1fr); gap:14px; } }

/* ── card ── */
.pw-card {
    position: relative; border-radius: var(--radius-card);
    background: rgba(10, 4, 48, 0.82);
    border: 1px solid rgba(120,0,220,0.22);
    overflow: hidden; display: flex; flex-direction: column;
    transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
}
.pw-card:hover {
    transform: translateY(-4px);
    border-color: rgba(160,0,255,0.45);
    box-shadow: 0 6px 28px rgba(100,0,200,0.18);
}
.pw-num-badge {
    position: absolute; top: 8px; left: 8px; z-index: 3;
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg, #5500aa, #330066);
    border: 2px solid rgba(180,80,255,0.65);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; color: #fff;
}
.pw-photo-wrap {
    position: relative; width: 100%;
    aspect-ratio: 3/4; overflow: hidden; background: #08033a;
}
.pw-photo {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform 0.35s ease;
}
.pw-card:hover .pw-photo { transform: scale(1.04); }
.pw-photo-overlay {
    position: absolute; bottom: 0; left: 0; right: 0; height: 50%;
    background: linear-gradient(to top, rgba(4,1,28,0.90) 0%, transparent 100%);
    pointer-events: none;
}
.pw-card-body {
    padding: 10px 12px 13px;
    display: flex; flex-direction: column; gap: 5px; flex: 1;
}
.pw-contestant-label {
    font-size: 0.62rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-secondary); margin: 0;
}
.pw-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600; font-size: 0.88rem;
    color: var(--text-primary); margin: 0 0 4px; line-height: 1.2;
}
.pw-score-wrap { margin-top: auto; }
.pw-score-label {
    display: flex; align-items: center;
    font-size: 0.68rem; color: #aa77ff;
    font-weight: 600; letter-spacing: 0.10em;
    text-transform: uppercase; margin-bottom: 4px;
}
/* hide native spinners */
.pw-score-input::-webkit-inner-spin-button,
.pw-score-input::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
.pw-stepper { display: flex; align-items: stretch; gap: 5px; }
.pw-score-input {
    flex: 1; min-width: 0;
    background: rgba(80,0,180,0.22);
    border: 1px solid rgba(140,0,255,0.42);
    border-radius: 9px; color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.15rem; font-weight: 700;
    text-align: center; padding: 7px 6px;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; -moz-appearance: textfield;
}
.pw-score-input:focus {
    border-color: rgba(180,0,255,0.75);
    box-shadow: 0 0 12px rgba(140,0,220,0.28); color: #ddaaff;
}
.pw-stepper-btns { display: flex; flex-direction: column; gap: 4px; flex-shrink: 0; }
.pw-step-btn {
    display: flex; align-items: center; justify-content: center;
    width: 28px; flex: 1;
    background: rgba(80,0,160,0.32);
    border: 1px solid rgba(160,0,255,0.45);
    border-radius: 7px; color: #cc88ff;
    font-size: 0.70rem; cursor: pointer;
    transition: background 0.15s, color 0.15s, transform 0.12s, border-color 0.15s, box-shadow 0.15s;
    user-select: none; padding: 0; line-height: 1;
    touch-action: manipulation; -webkit-tap-highlight-color: transparent; outline: none;
}
.pw-stepper .pw-step-btn:hover {
    background: rgba(160,0,255,0.55) !important; color: #ffffff !important;
    border-color: rgba(200,80,255,0.85) !important;
    box-shadow: 0 0 10px rgba(160,0,255,0.50), inset 0 0 6px rgba(160,0,255,0.18) !important;
}
.pw-stepper .pw-step-btn:active {
    background: rgba(180,0,255,0.70) !important; color: #ffffff !important;
    border-color: rgba(210,100,255,0.95) !important;
    box-shadow: 0 0 16px rgba(180,0,255,0.70), inset 0 0 8px rgba(180,0,255,0.30) !important;
    transform: scale(0.88) !important;
}
.pw-stepper .pw-step-btn:focus-visible {
    outline: 2px solid rgba(200,80,255,0.85) !important; outline-offset: 2px;
}

/* ── floating buttons ── */
.floating-button {
    position: fixed; bottom: 24px; right: 24px;
    z-index: 1000; display: flex; gap: 10px;
    flex-direction: column; align-items: flex-end;
}
.pw-submit-btn {
    position: relative; display: flex; align-items: center;
    overflow: hidden; padding: 14px 32px; border-radius: 50px;
    background: linear-gradient(135deg, #8800ff 0%, #5500aa 50%, #330066 100%);
    border: none;
    outline: 2px solid rgba(180,80,255,0.50); outline-offset: 3px;
    color: #fff; font-family: 'Orbitron', sans-serif;
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.10em; text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(120,0,220,0.50);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.pw-submit-shimmer {
    position: absolute; top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.26) 50%, transparent 60%);
    animation: pwShimmer 2.6s ease-in-out infinite;
    pointer-events: none;
}
@keyframes pwShimmer { 0%{left:-75%} 60%,100%{left:130%} }
.pw-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px rgba(160,0,255,0.65);
}
.pw-submit-btn:active { transform: scale(0.97); }
.pw-generate-btn {
    display: flex; align-items: center; padding: 9px 18px; border-radius: 50px;
    background: linear-gradient(135deg, #330066, #220044);
    border: 1px solid rgba(160,80,255,0.42); color: #cc88ff;
    font-family: 'Rajdhani', sans-serif; font-size: 0.86rem; font-weight: 600;
    cursor: pointer; transition: var(--transition);
}
.pw-generate-btn:hover { background: linear-gradient(135deg, #440088, #330066); }
.pw-generate-btn:disabled { opacity: 0.55; cursor: not-allowed; pointer-events: none; }

/* ── ranking section ── */
.pw-rank-section { margin-top: 36px; padding-bottom: 40px; }
.pw-rank-card {
    background: rgba(10, 4, 48, 0.88);
    border: 1px solid rgba(140,0,255,0.26);
    border-top: 3px solid rgba(140,0,255,0.55);
    border-radius: var(--radius-card); padding: 26px;
}
.pw-rank-header {
    font-family: 'Orbitron', sans-serif; font-size: 1.05rem;
    font-weight: 700; color: #cc88ff; margin-bottom: 5px;
}
.pw-rank-judge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem;
    color: var(--text-secondary); margin-bottom: 18px;
}
.pw-table { width: 100%; border-collapse: collapse; font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; }
.pw-table thead tr { background: rgba(80,0,180,0.22); }
.pw-table th {
    padding: 11px 14px; text-align: center; color: #cc88ff;
    font-size: 0.76rem; letter-spacing: 0.13em; text-transform: uppercase;
    border-bottom: 1px solid rgba(140,0,255,0.28);
}
.pw-table td {
    padding: 11px 14px; text-align: center;
    color: var(--text-primary); border-bottom: 1px solid rgba(100,0,200,0.15);
}
.pw-table tbody tr:hover { background: rgba(80,0,180,0.18); }
.pw-signature {
    display: flex; flex-direction: column; align-items: center;
    margin-top: 24px; gap: 5px;
}
.pw-sig-line {
    padding: 5px 26px;
    border-bottom: 2px solid rgba(180,100,255,0.55);
    font-family: 'Orbitron', sans-serif; font-size: 0.82rem;
    color: var(--text-primary); letter-spacing: 0.08em;
}
.pw-sig-desc { font-size: 0.70rem; color: var(--text-secondary); letter-spacing: 0.14em; text-transform: uppercase; }
.pw-print-wrap { display: flex; justify-content: center; margin-top: 20px; }
.pw-print-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(180,140,0,0.22);
    border: 1px solid rgba(220,180,0,0.42); color: #ffe066;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    cursor: pointer; transition: var(--transition);
}
.pw-print-btn:hover { background: rgba(200,160,0,0.32); }
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
            .pw-signature { margin-top:30px; display:flex; flex-direction:column; align-items:center; gap:6px; }
            .pw-sig-line { border-bottom:2px solid black; padding:0 30px; font-size:14px; }
            .pw-sig-desc { font-size:12px; }
            .pw-print-wrap { display:none; }
            .pw-rank-judge { font-size:18px; margin-bottom:20px; }
            .pw-rank-header { font-size:28px; margin-bottom:8px; }
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
        function pwStepInput($input, dir) {
            const step = parseFloat($input.attr('step')) || 0.1, max = parseFloat($input.attr('max')) || 10, min = parseFloat($input.attr('min')) || 1;
            const current = parseFloat($input.val());
            if (isNaN(current) || current < min) { if (dir > 0) $input.val(min.toFixed(1)); return; }
            const next = Math.round((current + dir * step) * 10) / 10;
            if (next >= min && next <= max) $input.val(next.toFixed(1));
        }
        $(document).on('touchend click', '.pw-step-up', function (e) { e.preventDefault(); pwStepInput($(this).closest('.pw-stepper').find('input'), +1); });
        $(document).on('touchend click', '.pw-step-dn', function (e) { e.preventDefault(); pwStepInput($(this).closest('.pw-stepper').find('input'), -1); });

        $('#production_wear-form').submit(function (event) {
            event.preventDefault();
            const $btn = $('.pw-submit-btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{ route('post_production_wear_form') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Scores Saved!',
                        text: 'Filipiniana Wear grading submitted successfully.',
                        background: 'rgba(10, 4, 50, 0.97)',
                        color: '#e0d0ff',
                        iconColor: '#aa77ff',
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(140,0,255,0.45)';
                            toast.style.boxShadow = '0 8px 32px rgba(100,0,200,0.40)';
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
                        background: 'rgba(10, 4, 50, 0.97)',
                        color: '#e0d0ff',
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

        function loadRankings(forceScroll) {
            var alreadyVisible = !document.getElementById('rank-table-container').hasAttribute('hidden');
            $('#rank-table').empty();
            $('#generate-rank').prop('disabled', true);
            $.ajax({
                type: 'GET',
                url: '{{ route('rank_production_wear') }}',
                success: function (response) {
                    $.each(response.ranking, function (key, value) {
                        $('#rank-table').append(`<tr><td>${value.ranking}</td><td>${value.contestant_number}</td><td>${value.contestant_name}</td><td>${value.score}</td></tr>`);
                    });
                    $('#rank-table-container').removeAttr('hidden');
                    $('#generate-rank').prop('disabled', false);
                    if (!alreadyVisible || forceScroll) {
                        document.getElementById('rank-table-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                },
                error: function (error) { console.error(error); }
            });
        }

        $('#generate-rank').click(function (event) {
            event.preventDefault();
            loadRankings();
        });
    });
</script>
@endpush

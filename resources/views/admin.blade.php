@extends('layouts.app')

@section('content')

{{-- ── Futuristic background (reused from home) ── --}}
<div class="adm-bg" aria-hidden="true">
    <div class="adm-base"></div>
    <div class="adm-orb adm-orb-1"></div>
    <div class="adm-orb adm-orb-2"></div>
    <div class="adm-orb adm-orb-3"></div>
    <div class="adm-grid"></div>
    <div class="adm-scan"></div>
    <div class="adm-edge-top"></div>
</div>

<div class="adm-page">

    {{-- ── Page Header ── --}}
    <div class="adm-header">
        <div class="adm-header-inner">
            <div class="adm-header-icon">
                <i class="bi bi-person-fill-lock"></i>
            </div>
            <div>
                <p class="adm-header-label">Kababajinhang Surogon 2026</p>
                <h1 class="adm-header-title">Admin Control Panel</h1>
            </div>
            <div class="adm-header-badge">
                <i class="bi bi-shield-fill-check me-1"></i>Secured
            </div>
            <button type="button" class="adm-pdf-btn" id="btn-export-pdf" title="Download full pageant report as PDF">
                <i class="bi bi-file-earmark-pdf-fill me-1"></i>Export PDF Report
            </button>
            <button class="adm-theme-toggle" id="adm-theme-toggle" title="Toggle light / dark mode" type="button">
                <i class="bi bi-sun-fill" id="adm-theme-icon"></i>
            </button>
        </div>
    </div>

    {{-- ── Tab navigation ── --}}
    <div class="adm-tabs" role="tablist">
        <button class="adm-tab adm-tab--violet is-active" data-tab="pre-judge" role="tab" aria-selected="true">
            <div class="adm-tab-icon"><i class="bi bi-clipboard2-data-fill"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Pre-Judge</span>
                <span class="adm-tab-sub">Preliminary</span>
            </div>
        </button>
        <button class="adm-tab adm-tab--cyan" data-tab="top8" role="tab" aria-selected="false">
            <div class="adm-tab-icon"><i class="bi bi-stars"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Top 8</span>
                <span class="adm-tab-sub">Round 1</span>
            </div>
        </button>
        <button class="adm-tab adm-tab--gold" data-tab="overall" role="tab" aria-selected="false">
            <div class="adm-tab-icon"><i class="bi bi-trophy-fill"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Overall</span>
                <span class="adm-tab-sub">Top 8 Rankings</span>
            </div>
        </button>
        <button class="adm-tab adm-tab--teal" data-tab="snap-talk" role="tab" aria-selected="false">
            <div class="adm-tab-icon"><i class="bi bi-chat-right-heart-fill"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Snap Talk</span>
                <span class="adm-tab-sub">Round 2</span>
            </div>
        </button>
        <button class="adm-tab adm-tab--golden" data-tab="final" role="tab" aria-selected="false">
            <div class="adm-tab-icon"><i class="bi bi-gem"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Final Event</span>
                <span class="adm-tab-sub">Grand Finale</span>
            </div>
        </button>
        <button class="adm-tab adm-tab--online" data-tab="online" role="tab" aria-selected="false">
            <div class="adm-tab-icon"><i class="bi bi-broadcast-pin"></i></div>
            <div class="adm-tab-text">
                <span class="adm-tab-label">Judges <span class="adm-online-badge" id="tab-online-count">0</span></span>
                <span class="adm-tab-sub">Live Monitor</span>
            </div>
        </button>
    </div>

    {{-- ── Tab panels ── --}}

    {{-- PANEL 1 — PRE-JUDGE --}}
    <div class="adm-tab-panel adm-panel--violet is-active" id="tab-pre-judge" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon violet"><i class="bi bi-clipboard2-data-fill"></i></div>
            <div>
                <p class="adm-section-sub">Pre-Judging</p>
                <h2 class="adm-section-title">Pre-Judge Rankings</h2>
            </div>
            <div class="adm-btn-group ms-auto">
                <button class="adm-btn adm-btn--violet" id="preliminary-ranking">
                    <i class="bi bi-eye-fill me-2"></i>View Rankings
                </button>
                <button class="adm-btn adm-btn--ghost" id="preliminary-ranking-close">
                    <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <div class="adm-table-wrap" id="print-preliminary-ranking" hidden>
            <div class="adm-table-header">
                <span class="adm-table-title"><i class="bi bi-table me-2"></i>Pre-Judge Category Scores</span>
                <button class="adm-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print
                </button>
            </div>
            <div class="table-responsive">
                <table class="adm-table" id="preliminary-ranking-container">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Total Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Closed Interview</th>
                            <th>Photogenic</th>
                            <th>White Collection</th>
                            <th>Tourism Video</th>
                            <th>Talent</th>
                            <th>Filipiniana</th>
                            <th>Production Wear</th>
                            <th>Production Number</th>
                            <th>Runway</th>
                        </tr>
                    </thead>
                    <tbody id="preliminary-rank-table"></tbody>
                </table>
            </div>
            <div class="sign-container d-none">
                <div class="sign">Signature Over Printed Name</div>
            </div>
        </div>
    </div>

    {{-- PANEL 2 — TOP 8 / ROUND 1 --}}
    <div class="adm-tab-panel adm-panel--cyan" id="tab-top8" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon cyan"><i class="bi bi-stars"></i></div>
            <div>
                <p class="adm-section-sub">Round 1</p>
                <h2 class="adm-section-title">Top 8 Selection</h2>
            </div>
            <div class="adm-btn-group ms-auto flex-wrap">
                <button class="adm-btn adm-btn--cyan" id="swimsuit-ranking">
                    <i class="bi bi-hearts me-2"></i>Swimwear
                </button>
                <button class="adm-btn adm-btn--cyan" id="gown-ranking">
                    <i class="bi bi-suit-heart-fill me-2"></i>Gown
                </button>
                <button class="adm-btn adm-btn--ghost swimsuit-ranking-close">
                    <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <div class="adm-table-wrap" hidden id="swimsuit-ranking-container">
            <div class="adm-table-header">
                <span class="adm-table-title" id="table-title"><i class="bi bi-table me-2"></i>Swimwear Rankings</span>
                <button class="adm-print-btn" type="button" onclick="printCorination()">
                    <i class="bi bi-printer-fill me-2"></i>Print
                </button>
            </div>
            <div class="table-responsive">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Overall Rank</th>
                            <th>Judge 1</th>
                            <th>Judge 2</th>
                            <th>Judge 3</th>
                            <th>Judge 4</th>
                            <th>Judge 5</th>
                        </tr>
                    </thead>
                    <tbody id="swimsuit-rank-table"></tbody>
                </table>
            </div>
            <div class="sign-container d-none">
                <div class="sign">Signature Over Printed Name</div>
            </div>
        </div>

    </div>

    {{-- PANEL 3 — TOP 8 OVERALL RANKINGS --}}
    <div class="adm-tab-panel adm-panel--gold" id="tab-overall" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon gold"><i class="bi bi-trophy-fill"></i></div>
            <div>
                <p class="adm-section-sub">Top 8 Rankings</p>
                <h2 class="adm-section-title">Top 8 Overall Rankings</h2>
            </div>
            <div class="adm-btn-group ms-auto flex-wrap">
                <button class="adm-btn adm-btn--gold" id="overall-ranking">
                    <i class="bi bi-bar-chart-fill me-2"></i>View Overall
                </button>
                <button class="adm-btn adm-btn--cyan" type="button" id="open-r2-selector">
                    <i class="bi bi-people-fill me-2"></i>Select for Round 2
                </button>
                <button class="adm-btn adm-btn--ghost overall-ranking-close">
                    <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <div class="adm-table-wrap" hidden id="overall-ranking-container">
            <div class="adm-table-header">
                <span class="adm-table-title"><i class="bi bi-award-fill me-2"></i>Top 8 Combined Rankings</span>
                <button class="adm-print-btn" type="button" onclick="printOverAll()">
                    <i class="bi bi-printer-fill me-2"></i>Print
                </button>
            </div>
            <div class="table-responsive">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Total Rank</th>
                            <th>Swimwear Rank</th>
                            <th>Gown Rank</th>
                            <th class="adm-th-highlight">Preliminary</th>
                        </tr>
                    </thead>
                    <tbody id="overall-rank-table"></tbody>
                </table>
            </div>
            <div class="sign-container d-none">
                <div class="sign">Signature Over Printed Name</div>
            </div>
        </div>

        {{-- ROUND 2 SELECTOR --}}
        <div class="adm-r2-selector-wrap" id="r2-selector-wrap" hidden>
            <div class="adm-r2-selector-header">
                <div class="adm-r2-selector-title">
                    <i class="bi bi-people-fill me-2"></i>Select Top 8 for Round 2
                </div>
                <div class="adm-r2-actions">
                    <span class="adm-r2-counter" id="r2-counter"><span id="r2-count">0</span> / 8 selected</span>
                    <button class="adm-btn adm-btn--gold" type="button" id="r2-auto-select">
                        <i class="bi bi-magic me-2"></i>Auto-Select Top 8
                    </button>
                    <button class="adm-btn adm-btn--cyan" type="button" id="r2-proceed" disabled>
                        <i class="bi bi-arrow-right-circle-fill me-2"></i>Proceed to Round 2
                    </button>
                    <button class="adm-btn adm-btn--ghost" type="button" id="r2-close" title="Dismiss selector">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="adm-table adm-r2-table">
                    <thead>
                        <tr>
                            <th style="width:42px"><i class="bi bi-check2-square"></i></th>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Total Rank</th>
                            <th>Swimwear</th>
                            <th>Gown</th>
                            <th>Preliminary</th>
                        </tr>
                    </thead>
                    <tbody id="r2-selector-table"></tbody>
                </table>
            </div>
            <div class="adm-r2-status" id="r2-status" hidden></div>
        </div>

    </div>

    {{-- PANEL 4 — SNAP TALK / ROUND 2 --}}
    <div class="adm-tab-panel adm-panel--teal" id="tab-snap-talk" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon teal"><i class="bi bi-chat-right-heart-fill"></i></div>
            <div>
                <p class="adm-section-sub">Round 2</p>
                <h2 class="adm-section-title">Snap Talk — Top 3 Selection</h2>
            </div>
            <div class="adm-btn-group ms-auto flex-wrap">
                <button class="adm-btn adm-btn--teal" id="snap-ranking">
                    <i class="bi bi-eye-fill me-2"></i>View Rankings
                </button>
                <button class="adm-btn adm-btn--rose" type="button" id="open-final-selector">
                    <i class="bi bi-gem me-2"></i>Select for Final
                </button>
                <button class="adm-btn adm-btn--ghost snap-ranking-close">
                    <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <div class="adm-table-wrap" hidden id="snap-ranking-container">
            <div class="adm-table-header">
                <span class="adm-table-title"><i class="bi bi-table me-2"></i>Snap Talk Rankings</span>
                <button class="adm-print-btn" type="button" onclick="printSnapTalk()">
                    <i class="bi bi-printer-fill me-2"></i>Print
                </button>
            </div>
            <div class="table-responsive">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Overall Rank</th>
                            <th>Judge 1</th>
                            <th>Judge 2</th>
                            <th>Judge 3</th>
                            <th>Judge 4</th>
                            <th>Judge 5</th>
                        </tr>
                    </thead>
                    <tbody id="snap-rank-table"></tbody>
                </table>
            </div>
            <div class="sign-container d-none">
                <div class="sign">Signature Over Printed Name</div>
            </div>
        </div>

        {{-- FINAL SELECTOR --}}
        <div class="adm-final-selector-wrap" id="final-selector-wrap" hidden>
            <div class="adm-final-selector-header">
                <div class="adm-final-selector-title">
                    <i class="bi bi-gem me-2"></i>Select Top 3 for Final Event
                </div>
                <div class="adm-r2-actions">
                    <span class="adm-final-counter" id="final-counter"><span id="final-count">0</span> / 3 selected</span>
                    <button class="adm-btn adm-btn--teal" type="button" id="final-auto-select">
                        <i class="bi bi-magic me-2"></i>Auto-Select Top 3
                    </button>
                    <button class="adm-btn adm-btn--rose" type="button" id="final-proceed" disabled>
                        <i class="bi bi-gem me-2"></i>Proceed to Final
                    </button>
                    <button class="adm-btn adm-btn--ghost" type="button" id="final-selector-close" title="Dismiss">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="adm-table adm-final-table">
                    <thead>
                        <tr>
                            <th style="width:42px"><i class="bi bi-check2-square"></i></th>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Judge 1</th>
                            <th>Judge 2</th>
                            <th>Judge 3</th>
                            <th>Judge 4</th>
                            <th>Judge 5</th>
                            <th>Overall Rank</th>
                        </tr>
                    </thead>
                    <tbody id="final-selector-table"></tbody>
                </table>
            </div>
            <div class="adm-final-status" id="final-status" hidden></div>
        </div>

    </div>

    {{-- PANEL 5 — FINAL EVENT (Golden Elegance) --}}
    <div class="adm-tab-panel adm-panel--golden" id="tab-final" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon golden"><i class="bi bi-gem"></i></div>
            <div>
                <p class="adm-section-sub">Grand Finale</p>
                <h2 class="adm-section-title adm-golden-title">Final Event Rankings</h2>
            </div>
            <div class="adm-btn-group ms-auto">
                <button class="adm-btn adm-btn--gold-final" id="final-ranking">
                    <i class="bi bi-trophy-fill me-2"></i>View Final Ranking
                </button>
                <button class="adm-btn adm-btn--ghost final-ranking-close">
                    <i class="bi bi-chevron-up"></i>
                </button>
            </div>
        </div>

        <div class="adm-table-wrap adm-golden-table-wrap" hidden id="final-ranking-container">
            <div class="adm-golden-crown-banner" aria-hidden="true">
                <span class="adm-golden-star">✦</span>
                <span class="adm-golden-crown"><i class="bi bi-trophy-fill"></i></span>
                <span class="adm-golden-title-banner">Top 3 Finalists</span>
                <span class="adm-golden-crown"><i class="bi bi-trophy-fill"></i></span>
                <span class="adm-golden-star">✦</span>
            </div>
            <div class="adm-table-header adm-golden-header">
                <span class="adm-table-title"><i class="bi bi-gem me-2"></i>Final Event — Top 3</span>
                <button class="adm-print-btn" type="button" onclick="printFinal()">
                    <i class="bi bi-printer-fill me-2"></i>Print
                </button>
            </div>
            <div class="table-responsive">
                <table class="adm-table adm-golden-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>No.</th>
                            <th>Contestant Name</th>
                            <th>Total Rank</th>
                            <th>Judge 1</th>
                            <th>Judge 2</th>
                            <th>Judge 3</th>
                            <th>Judge 4</th>
                            <th>Judge 5</th>
                        </tr>
                    </thead>
                    <tbody id="final-rank-table"></tbody>
                </table>
            </div>
            <div class="sign-container d-none">
                <div class="sign">Signature Over Printed Name</div>
            </div>
            <div class="final-print" style="display:none"></div>
        </div>
    </div>

    {{-- PANEL 6 — ONLINE JUDGES MONITOR --}}
    <div class="adm-tab-panel adm-panel--online" id="tab-online" role="tabpanel">
        <div class="adm-panel-bar">
            <div class="adm-section-icon online"><i class="bi bi-broadcast-pin"></i></div>
            <div>
                <p class="adm-section-sub">Live Session</p>
                <h2 class="adm-section-title">Online Judges Monitor</h2>
            </div>
            <div class="adm-btn-group ms-auto">
                <span class="adm-online-pulse" id="online-pulse-dot"></span>
                <span class="adm-online-status-text" id="online-status-text">Auto-refreshing every 30s</span>
                <button class="adm-btn adm-btn--online-refresh" id="btn-refresh-online" title="Refresh now">
                    <i class="bi bi-arrow-clockwise me-1"></i>Refresh
                </button>
            </div>
        </div>

        <div class="adm-online-grid" id="online-cards-grid">
            <div class="adm-online-loading" id="online-loading">
                <div class="adm-online-spinner"></div>
                <span>Loading judges&hellip;</span>
            </div>
        </div>

        <div class="adm-online-summary">
            <div class="adm-online-summary-item" id="summary-online">
                <i class="bi bi-circle-fill" style="color:#00e5b0"></i>
                <span id="count-online">0</span> Online
            </div>
            <div class="adm-online-summary-item" id="summary-offline">
                <i class="bi bi-circle-fill" style="color:#666"></i>
                <span id="count-offline">0</span> Offline
            </div>
            <div class="adm-online-summary-item">
                <i class="bi bi-clock-history" style="color:var(--adm-gold)"></i>
                Last updated: <span id="online-last-updated">&mdash;</span>
            </div>
        </div>
    </div>

</div>{{-- /adm-page --}}

<style>
/* ── Variables (dark defaults) ── */
:root {
    --adm-gold:       #f5c842;
    --adm-gold-light: #ffe98a;
    --adm-text:       #f0ebff;
    --adm-muted:      #a89acc;
    --adm-radius:     20px;
    --adm-radius-sm:  12px;
    --adm-transition: all 0.25s cubic-bezier(.4,0,.2,1);
    /* surface tokens */
    --adm-surface:        rgba(5,0,30,.60);
    --adm-surface-head:   rgba(80,40,140,.22);
    --adm-surface-row:    rgba(100,60,200,.14);
    --adm-border-table:   rgba(140,70,255,.20);
    --adm-border-row:     rgba(80,40,140,.18);
    --adm-border-table-h: rgba(140,70,255,.22);
    --adm-subsurface:     rgba(0,0,0,.18);
    --adm-btn-ghost-bg:   rgba(255,255,255,.06);
    --adm-btn-ghost-bdr:  rgba(255,255,255,.14);
    --adm-btn-ghost-clr:  var(--adm-muted);
    --adm-navbar-bg:      rgba(5,0,35,.80);
    --adm-navbar-bdr:     rgba(100,50,200,.35);
}

/* ── Light-mode variable overrides ── */
body.adm-light {
    --adm-text:       #1a0040;
    --adm-muted:      #5533aa;
    --adm-gold:       #8a5f00;
    --adm-gold-light: #a57200;
    --adm-surface:        rgba(255,255,255,.90);
    --adm-surface-head:   rgba(230,215,255,.80);
    --adm-surface-row:    rgba(180,140,255,.12);
    --adm-border-table:   rgba(140,80,255,.25);
    --adm-border-row:     rgba(160,100,255,.15);
    --adm-border-table-h: rgba(140,80,255,.30);
    --adm-subsurface:     rgba(240,235,255,.70);
    --adm-btn-ghost-bg:   rgba(80,0,160,.08);
    --adm-btn-ghost-bdr:  rgba(120,60,220,.25);
    --adm-btn-ghost-clr:  #5533aa;
    --adm-navbar-bg:      rgba(255,255,255,.92);
    --adm-navbar-bdr:     rgba(140,80,255,.30);
}

/* ── Body / background ── */
body { background-color: #03001c !important; }
body.adm-light { background-color: #f4efff !important; }
body, #app, #main-content { background: transparent !important; position: relative; }
[hidden] { display: none !important; }

/* ── Fixed background ── */
.adm-bg { position: fixed; inset: 0; z-index: 0; overflow: hidden; pointer-events: none; }
.adm-base {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse 120% 80% at 50% 0%, #12005e 0%, transparent 60%),
        radial-gradient(ellipse 90% 60% at 100% 100%, #000a3a 0%, transparent 55%),
        linear-gradient(160deg, #03001c 0%, #07003a 50%, #02001a 100%);
    transition: opacity .4s;
}
body.adm-light .adm-base {
    background:
        radial-gradient(ellipse 120% 80% at 50% 0%, rgba(200,170,255,.50) 0%, transparent 60%),
        radial-gradient(ellipse 90% 60% at 100% 100%, rgba(180,200,255,.35) 0%, transparent 55%),
        linear-gradient(160deg, #f4efff 0%, #ece6ff 50%, #f8f4ff 100%);
}
.adm-orb { position: absolute; border-radius: 50%; filter: blur(90px); opacity: 0;
    animation: admOrb var(--dur,12s) ease-in-out var(--delay,0s) infinite; }
.adm-orb-1 { width:520px; height:520px; background:radial-gradient(circle,rgba(120,0,255,.35) 0%,transparent 70%); top:-10%; left:-8%; --dur:14s; }
.adm-orb-2 { width:420px; height:420px; background:radial-gradient(circle,rgba(60,0,180,.30) 0%,transparent 70%); top:20%; right:-6%; --dur:11s; --delay:2s; }
.adm-orb-3 { width:600px; height:350px; background:radial-gradient(ellipse,rgba(80,20,200,.25) 0%,transparent 70%); bottom:-5%; left:15%; --dur:16s; --delay:4s; }
body.adm-light .adm-orb-1 { background:radial-gradient(circle,rgba(160,80,255,.18) 0%,transparent 70%); }
body.adm-light .adm-orb-2 { background:radial-gradient(circle,rgba(100,60,220,.14) 0%,transparent 70%); }
body.adm-light .adm-orb-3 { background:radial-gradient(ellipse,rgba(120,60,220,.12) 0%,transparent 70%); }
@keyframes admOrb { 0%,100%{opacity:0;transform:scale(.92)} 40%,60%{opacity:1;transform:scale(1.06)} }
.adm-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(100,50,255,.06) 1px,transparent 1px),
                      linear-gradient(90deg,rgba(100,50,255,.06) 1px,transparent 1px);
    background-size: 52px 52px;
    animation: admGridDrift 30s linear infinite;
}
body.adm-light .adm-grid {
    background-image: linear-gradient(rgba(120,60,255,.08) 1px,transparent 1px),
                      linear-gradient(90deg,rgba(120,60,255,.08) 1px,transparent 1px);
}
@keyframes admGridDrift { from{background-position:0 0,0 0} to{background-position:52px 52px,52px 52px} }
.adm-scan {
    position: absolute; left:0; right:0; height:180px;
    background: linear-gradient(to bottom,transparent,rgba(120,50,255,.05),transparent);
    animation: admScan 8s linear infinite;
}
@keyframes admScan { from{top:-180px} to{top:110%} }
.adm-edge-top {
    position: absolute; top:0; left:0; right:0; height:2px;
    background: linear-gradient(90deg,transparent,rgba(120,50,255,.6) 20%,rgba(200,100,255,.9) 50%,rgba(120,50,255,.6) 80%,transparent);
    animation: admEdge 4s ease-in-out infinite;
}
@keyframes admEdge { 0%,100%{opacity:.5} 50%{opacity:1;box-shadow:0 0 20px rgba(180,80,255,.6)} }

/* ── Page wrapper ── */
.adm-page {
    position: relative; z-index: 2;
    max-width: 1200px; margin: 0 auto;
    padding: 28px 20px 60px;
    display: flex; flex-direction: column; gap: 24px;
}

/* ── Page header ── */
.adm-header {
    background: linear-gradient(135deg, rgba(80,0,160,.55) 0%, rgba(10,0,55,.75) 100%);
    border: 1px solid rgba(180,100,255,.35);
    border-top: 3px solid rgba(180,80,255,.75);
    border-radius: var(--adm-radius);
    backdrop-filter: blur(20px);
    padding: 22px 28px;
    box-shadow: 0 0 40px rgba(120,0,255,.18);
}
body.adm-light .adm-header {
    background: linear-gradient(135deg, rgba(255,255,255,.88) 0%, rgba(240,230,255,.95) 100%);
    border-color: rgba(140,80,255,.35);
    border-top-color: #9944ee;
    box-shadow: 0 4px 30px rgba(120,60,220,.14);
}
.adm-header-inner { display:flex; align-items:center; gap:18px; flex-wrap:wrap; }
.adm-header-icon {
    width:54px; height:54px; border-radius:16px; flex-shrink:0;
    background: rgba(110,0,220,.35);
    border: 1px solid rgba(180,80,255,.40);
    display:grid; place-items:center;
    font-size:1.55rem; color:#cc88ff;
    box-shadow: 0 0 18px rgba(160,60,255,.35);
}
body.adm-light .adm-header-icon { background:rgba(160,80,255,.15); color:#7700cc; border-color:rgba(160,80,255,.35); box-shadow:0 0 14px rgba(140,60,255,.20); }
.adm-header-label {
    font-size:.68rem; letter-spacing:.22em; text-transform:uppercase;
    color:var(--adm-muted); margin:0 0 3px;
}
.adm-header-title {
    font-family:'Orbitron',sans-serif;
    font-size:clamp(1.1rem,3vw,1.6rem); font-weight:700;
    background: linear-gradient(90deg,#cc88ff,#aa44ff,#8800ee);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
    margin:0;
}
body.adm-light .adm-header-title {
    background: linear-gradient(90deg,#7700cc,#5500aa,#330088);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.adm-header-badge {
    margin-left:auto; padding:6px 16px; border-radius:50px;
    background: rgba(0,80,40,.35);
    border: 1px solid rgba(0,200,100,.40);
    font-size:.75rem; font-weight:600; letter-spacing:.12em; text-transform:uppercase;
    color:#44ffaa;
}
body.adm-light .adm-header-badge { background:rgba(0,120,60,.10); border-color:rgba(0,160,80,.35); color:#007040; }

/* ── Theme toggle button ── */
.adm-theme-toggle {
    width:40px; height:40px; border-radius:50%; flex-shrink:0;
    display:grid; place-items:center; font-size:1.05rem;
    background: rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.18);
    color:var(--adm-gold); cursor:pointer;
    transition: var(--adm-transition);
    margin-left:8px;
}
.adm-theme-toggle:hover { background:rgba(255,255,255,.16); transform:rotate(22deg) scale(1.08); }
body.adm-light .adm-theme-toggle { background:rgba(120,60,220,.10); border-color:rgba(140,80,255,.30); color:#7700cc; }

/* ── Tab navigation ── */
.adm-tabs {
    display: flex; gap: 10px;
    overflow-x: auto; padding-bottom: 4px;
    scrollbar-width: none;
}
.adm-tabs::-webkit-scrollbar { display: none; }

.adm-tab {
    display: flex; align-items: center; gap: 12px;
    flex-shrink: 0; padding: 12px 20px;
    border-radius: var(--adm-radius-sm);
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.10);
    cursor: pointer; transition: var(--adm-transition);
    position: relative; overflow: hidden;
}
body.adm-light .adm-tab {
    background: rgba(255,255,255,.75);
    border-color: rgba(160,100,255,.20);
    box-shadow: 0 2px 12px rgba(120,60,200,.08);
}
.adm-tab::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
    opacity: 0; transform: scaleX(0.4); transition: var(--adm-transition);
}
.adm-tab-icon {
    width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
    display: grid; place-items: center; font-size: 1.1rem;
    background: rgba(255,255,255,.06); color: rgba(255,255,255,.85);
    transition: var(--adm-transition);
}
body.adm-light .adm-tab-icon { background: rgba(80,40,160,.10); color: #5533aa; }
.adm-tab-text { display: flex; flex-direction: column; text-align: left; }
.adm-tab-label {
    font-family: 'Orbitron', sans-serif; font-size: .78rem;
    font-weight: 700; color: var(--adm-muted);
    transition: color .2s;
}
.adm-tab-sub {
    font-size: .62rem; letter-spacing: .18em; text-transform: uppercase;
    color: rgba(168,154,204,.55); transition: color .2s;
}
body.adm-light .adm-tab-sub { color: rgba(100,70,180,.50); }

/* ── Per-tab colors + active state ── */
.adm-tab--violet::after { background: linear-gradient(90deg, #aa44ff, #6600cc); }
.adm-tab--cyan::after   { background: linear-gradient(90deg, #00ccff, #0077aa); }
.adm-tab--gold::after   { background: linear-gradient(90deg, #f5c842, #aa7700); }
.adm-tab--teal::after   { background: linear-gradient(90deg, #00e5b0, #007a5e); }
.adm-tab--rose::after   { background: linear-gradient(90deg, #ff4488, #aa0044); }

.adm-tab--violet.is-active { background: rgba(120,0,220,.30); border-color: rgba(160,80,255,.50); box-shadow: 0 0 24px rgba(140,60,255,.30); }
.adm-tab--violet.is-active .adm-tab-icon { background: rgba(120,0,200,.40); color: #cc88ff; box-shadow: 0 0 14px rgba(160,60,255,.40); }
.adm-tab--violet.is-active .adm-tab-label { color: #cc88ff; }
.adm-tab--violet.is-active .adm-tab-sub   { color: rgba(200,140,255,.70); }

.adm-tab--cyan.is-active { background: rgba(0,100,160,.28); border-color: rgba(0,180,230,.45); box-shadow: 0 0 24px rgba(0,160,220,.25); }
.adm-tab--cyan.is-active .adm-tab-icon { background: rgba(0,100,150,.40); color: #44ddff; box-shadow: 0 0 14px rgba(0,180,230,.40); }
.adm-tab--cyan.is-active .adm-tab-label { color: #44ddff; }
.adm-tab--cyan.is-active .adm-tab-sub   { color: rgba(100,210,255,.70); }

.adm-tab--gold.is-active { background: rgba(120,85,0,.30); border-color: rgba(200,155,0,.50); box-shadow: 0 0 24px rgba(180,130,0,.28); }
.adm-tab--gold.is-active .adm-tab-icon { background: rgba(140,90,0,.38); color: var(--adm-gold); box-shadow: 0 0 14px rgba(200,155,0,.45); }
.adm-tab--gold.is-active .adm-tab-label { color: var(--adm-gold); }
.adm-tab--gold.is-active .adm-tab-sub   { color: rgba(220,180,60,.70); }

.adm-tab--rose.is-active { background: rgba(160,0,80,.28); border-color: rgba(220,70,140,.45); box-shadow: 0 0 24px rgba(200,50,120,.25); }
.adm-tab--rose.is-active .adm-tab-icon { background: rgba(150,0,70,.38); color: #ff88cc; box-shadow: 0 0 14px rgba(220,60,130,.40); }
.adm-tab--rose.is-active .adm-tab-label { color: #ff88cc; }
.adm-tab--rose.is-active .adm-tab-sub   { color: rgba(255,150,200,.70); }

.adm-tab--teal.is-active { background: rgba(0,90,70,.28); border-color: rgba(0,210,160,.45); box-shadow: 0 0 24px rgba(0,180,130,.25); }
.adm-tab--teal.is-active .adm-tab-icon { background: rgba(0,120,90,.38); color: #00e5b0; box-shadow: 0 0 14px rgba(0,200,150,.40); }
.adm-tab--teal.is-active .adm-tab-label { color: #00e5b0; }
.adm-tab--teal.is-active .adm-tab-sub   { color: rgba(0,220,170,.70); }

.adm-tab.is-active::after { opacity: 1; transform: scaleX(1); }
.adm-tab:not(.is-active):hover { background: rgba(255,255,255,.09); border-color: rgba(255,255,255,.18); }
.adm-tab:not(.is-active):hover .adm-tab-label { color: var(--adm-text); }
body.adm-light .adm-tab:not(.is-active):hover { background: rgba(240,230,255,.95); border-color: rgba(160,100,255,.35); }
/* Light active tabs */
body.adm-light .adm-tab--violet.is-active { background:rgba(240,220,255,.95); border-color:rgba(140,60,220,.45); box-shadow:0 4px 20px rgba(140,60,220,.18); }
body.adm-light .adm-tab--violet.is-active .adm-tab-icon { background:rgba(160,80,255,.15); color:#7700cc; }
body.adm-light .adm-tab--violet.is-active .adm-tab-label { color:#7700cc; }
body.adm-light .adm-tab--violet.is-active .adm-tab-sub   { color:rgba(120,40,200,.65); }
body.adm-light .adm-tab--cyan.is-active { background:rgba(220,245,255,.95); border-color:rgba(0,140,200,.40); box-shadow:0 4px 20px rgba(0,140,200,.16); }
body.adm-light .adm-tab--cyan.is-active .adm-tab-icon { background:rgba(0,140,200,.12); color:#006699; }
body.adm-light .adm-tab--cyan.is-active .adm-tab-label { color:#006699; }
body.adm-light .adm-tab--cyan.is-active .adm-tab-sub   { color:rgba(0,100,160,.60); }
body.adm-light .adm-tab--gold.is-active { background:rgba(255,248,220,.95); border-color:rgba(160,110,0,.40); box-shadow:0 4px 20px rgba(160,110,0,.16); }
body.adm-light .adm-tab--gold.is-active .adm-tab-icon { background:rgba(160,110,0,.12); color:#7a5200; }
body.adm-light .adm-tab--gold.is-active .adm-tab-label { color:#7a5200; }
body.adm-light .adm-tab--gold.is-active .adm-tab-sub   { color:rgba(120,80,0,.60); }
body.adm-light .adm-tab--rose.is-active { background:rgba(255,230,240,.95); border-color:rgba(200,50,110,.40); box-shadow:0 4px 20px rgba(200,50,110,.15); }
body.adm-light .adm-tab--rose.is-active .adm-tab-icon { background:rgba(200,50,100,.12); color:#aa003a; }
body.adm-light .adm-tab--rose.is-active .adm-tab-label { color:#aa003a; }
body.adm-light .adm-tab--rose.is-active .adm-tab-sub   { color:rgba(160,30,80,.60); }
body.adm-light .adm-tab--teal.is-active { background:rgba(220,255,250,.95); border-color:rgba(0,170,130,.40); box-shadow:0 4px 20px rgba(0,160,120,.16); }
body.adm-light .adm-tab--teal.is-active .adm-tab-icon { background:rgba(0,150,110,.12); color:#005f48; }
body.adm-light .adm-tab--teal.is-active .adm-tab-label { color:#005f48; }
body.adm-light .adm-tab--teal.is-active .adm-tab-sub   { color:rgba(0,120,90,.60); }

/* ── Tab panels ── */
.adm-tab-panel {
    display: none;
    flex-direction: column; gap: 20px;
    border-radius: var(--adm-radius);
    backdrop-filter: blur(18px);
    padding: 24px;
    position: relative; overflow: hidden;
    animation: admFadeIn .35s ease both;
}
.adm-tab-panel.is-active { display: flex; }
.adm-tab-panel::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    border-radius: var(--adm-radius) var(--adm-radius) 0 0;
}
.adm-panel--violet { background: rgba(60,0,130,.28); border: 1px solid rgba(140,60,255,.28); }
.adm-panel--violet::before { background: linear-gradient(90deg, #aa44ff, #6600cc); }
.adm-panel--cyan   { background: rgba(0,50,80,.25); border: 1px solid rgba(0,160,220,.25); }
.adm-panel--cyan::before { background: linear-gradient(90deg, #00ccff, #0088cc); }
.adm-panel--gold   { background: rgba(80,55,0,.28); border: 1px solid rgba(200,155,0,.28); }
.adm-panel--gold::before { background: linear-gradient(90deg,#7a5400,#c9960a,#ffe066,#f5c842,#c9960a,#7a5400); background-size:300% 100%; animation: admBarShimmer 3s linear infinite; }
@keyframes admBarShimmer { from{background-position:100% 0} to{background-position:-200% 0} }
.adm-panel--rose   { background: rgba(80,0,40,.28); border: 1px solid rgba(220,80,130,.25); }
.adm-panel--rose::before { background: linear-gradient(90deg,#cc0055,#ff4488,#ff88bb,#ff4488,#cc0055); background-size:300% 100%; animation: admBarShimmer 3s linear infinite; }
.adm-panel--teal   { background: rgba(0,60,50,.28); border: 1px solid rgba(0,200,150,.22); }
.adm-panel--teal::before { background: linear-gradient(90deg,#006644,#00c890,#00ffcc,#00c890,#006644); background-size:300% 100%; animation: admBarShimmer 3s linear infinite; }
/* Light panels */
body.adm-light .adm-panel--violet { background:rgba(245,235,255,.90); border-color:rgba(140,60,220,.28); box-shadow:0 4px 24px rgba(120,60,200,.10); }
body.adm-light .adm-panel--cyan   { background:rgba(235,248,255,.90); border-color:rgba(0,150,210,.25); box-shadow:0 4px 24px rgba(0,140,200,.10); }
body.adm-light .adm-panel--gold   { background:rgba(255,252,235,.90); border-color:rgba(180,130,0,.25); box-shadow:0 4px 24px rgba(160,110,0,.10); }
body.adm-light .adm-panel--rose   { background:rgba(255,238,245,.90); border-color:rgba(200,60,110,.25); box-shadow:0 4px 24px rgba(180,50,100,.10); }
body.adm-light .adm-panel--teal   { background:rgba(230,255,250,.90); border-color:rgba(0,170,130,.22); box-shadow:0 4px 24px rgba(0,150,110,.10); }

/* ── Panel action bar ── */
.adm-panel-bar {
    display: flex; align-items: center; gap: 16px; flex-wrap: wrap;
}

/* ── Section header row (kept for panel-bar descendants) ── */
.adm-section-icon {
    width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0;
    display: grid; place-items: center; font-size: 1.3rem;
}
.adm-section-icon.violet { background:rgba(110,0,220,.35); color:#cc77ff; box-shadow:0 0 16px rgba(160,60,255,.35); }
.adm-section-icon.cyan   { background:rgba(0,100,160,.30); color:#44ddff; box-shadow:0 0 16px rgba(0,180,230,.30); }
.adm-section-icon.teal   { background:rgba(0,120,90,.30); color:#00e5b0; box-shadow:0 0 16px rgba(0,200,150,.30); }
.adm-section-icon.rose   { background:rgba(160,0,80,.30); color:#ff88cc; box-shadow:0 0 18px rgba(220,50,120,.40); }
.adm-section-icon.gold-sm { width:36px; height:36px; border-radius:10px; font-size:1rem; background:rgba(130,90,0,.28); color:var(--adm-gold); box-shadow:0 0 12px rgba(200,155,0,.30); }
@keyframes admIconPulse { 0%,100%{box-shadow:0 0 14px rgba(200,150,0,.35)} 50%{box-shadow:0 0 28px rgba(240,190,0,.70)} }
body.adm-light .adm-section-icon.violet { background:rgba(160,80,255,.14); color:#7700cc; box-shadow:0 0 12px rgba(140,60,220,.18); }
body.adm-light .adm-section-icon.cyan   { background:rgba(0,140,200,.12); color:#006699; box-shadow:0 0 12px rgba(0,140,200,.16); }
body.adm-light .adm-section-icon.teal  { background:rgba(0,150,110,.12); color:#005f48; box-shadow:0 0 12px rgba(0,150,110,.16); }
body.adm-light .adm-section-icon.rose   { background:rgba(200,50,100,.12); color:#aa003a; box-shadow:0 0 12px rgba(200,50,100,.18); }
body.adm-light .adm-section-icon.gold-sm { background:rgba(160,110,0,.10); color:#7a5200; }

/* ── Subsection (nested card) ── */
.adm-subsection {
    background: var(--adm-subsurface);
    border: 1px solid rgba(200,155,0,.20);
    border-radius: var(--adm-radius-sm);
    padding: 18px 20px;
    display: flex; flex-direction:column; gap:16px;
}
body.adm-light .adm-subsection { border-color: rgba(180,130,0,.25); }
.adm-subsection-header { display:flex; align-items:center; gap:12px; flex-wrap:wrap; }
.adm-subsection-title { font-family:'Orbitron',sans-serif; font-size:.85rem; font-weight:700; color:var(--adm-gold); }

/* ── Button groups ── */
.adm-btn-group { display:flex; align-items:center; gap:8px; }
.adm-btn {
    display:inline-flex; align-items:center; padding:9px 20px;
    border-radius:50px; font-family:'Rajdhani',sans-serif;
    font-size:.875rem; font-weight:700; letter-spacing:.06em;
    border:none; cursor:pointer; transition:var(--adm-transition);
    white-space:nowrap;
}
.adm-btn--violet { background:rgba(120,0,220,.35); border:1px solid rgba(160,80,255,.50); color:#cc88ff; }
.adm-btn--violet:hover { background:rgba(150,30,255,.45); box-shadow:0 0 20px rgba(160,60,255,.40); }
.adm-btn--cyan { background:rgba(0,100,160,.32); border:1px solid rgba(0,180,230,.45); color:#66ddff; }
.adm-btn--cyan:hover { background:rgba(0,130,200,.42); box-shadow:0 0 20px rgba(0,180,230,.35); }
.adm-btn--gold { background:rgba(120,85,0,.35); border:1px solid rgba(200,155,0,.50); color:var(--adm-gold); }
.adm-btn--gold:hover { background:rgba(160,115,0,.45); box-shadow:0 0 20px rgba(200,155,0,.40); }
.adm-btn--teal { background:rgba(0,100,80,.32); border:1px solid rgba(0,200,150,.45); color:#00e5b0; }
.adm-btn--teal:hover { background:rgba(0,130,100,.42); box-shadow:0 0 20px rgba(0,200,150,.35); }
.adm-btn--rose { background:rgba(160,0,80,.32); border:1px solid rgba(220,80,140,.45); color:#ff99cc; }
.adm-btn--rose:hover { background:rgba(200,0,100,.42); box-shadow:0 0 20px rgba(220,60,130,.40); }
.adm-btn--ghost { background:var(--adm-btn-ghost-bg); border:1px solid var(--adm-btn-ghost-bdr); color:var(--adm-btn-ghost-clr); padding:9px 13px; }
.adm-btn--ghost:hover { background:rgba(255,255,255,.12); color:var(--adm-text); }
body.adm-light .adm-btn--ghost:hover { background:rgba(120,60,220,.12); color:#5500aa; }
body.adm-light .adm-btn--violet { background:rgba(140,60,220,.14); border-color:rgba(140,60,220,.40); color:#7700cc; }
body.adm-light .adm-btn--cyan   { background:rgba(0,130,190,.12); border-color:rgba(0,140,200,.38); color:#005f88; }
body.adm-light .adm-btn--gold   { background:rgba(150,100,0,.12); border-color:rgba(160,110,0,.40); color:#7a5200; }
body.adm-light .adm-btn--teal   { background:rgba(0,130,100,.12); border-color:rgba(0,150,110,.38); color:#005f48; }
body.adm-light .adm-btn--rose   { background:rgba(180,40,90,.12); border-color:rgba(200,50,100,.38); color:#9a0040; }

/* ── Table wrapper card ── */
.adm-table-wrap {
    background: var(--adm-surface);
    border: 1px solid var(--adm-border-table);
    border-radius: var(--adm-radius-sm);
    overflow: hidden;
    animation: admFadeIn .4s ease both;
}
@keyframes admFadeIn { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }
.adm-table-header {
    display:flex; align-items:center; justify-content:space-between;
    padding:14px 20px;
    background: var(--adm-surface-head);
    border-bottom: 1px solid var(--adm-border-table);
}
.adm-table-title {
    font-family:'Orbitron',sans-serif; font-size:.82rem;
    font-weight:700; color:var(--adm-gold); letter-spacing:.06em;
}
.adm-print-btn {
    display:inline-flex; align-items:center; padding:7px 18px; border-radius:50px;
    background:rgba(80,55,0,.35); border:1px solid rgba(200,155,0,.40); color:var(--adm-gold-light);
    font-family:'Rajdhani',sans-serif; font-size:.82rem; font-weight:600;
    cursor:pointer; transition:var(--adm-transition);
}
.adm-print-btn:hover { background:rgba(130,90,0,.50); }
body.adm-light .adm-print-btn { background:rgba(150,100,0,.10); border-color:rgba(160,110,0,.40); color:#7a5200; }
body.adm-light .adm-print-btn:hover { background:rgba(150,100,0,.18); }

/* ── Data table ── */
.adm-table {
    width:100%; border-collapse:collapse;
    font-family:'Rajdhani',sans-serif; font-size:.875rem;
}
.adm-table thead tr { background: var(--adm-surface-head); }
.adm-table th {
    padding:11px 14px; text-align:center; white-space:nowrap;
    font-size:.70rem; letter-spacing:.12em; text-transform:uppercase;
    color:var(--adm-gold); font-weight:700;
    border-bottom: 1px solid var(--adm-border-table-h);
}
.adm-th-highlight { background:rgba(120,80,0,.18) !important; color:var(--adm-gold) !important; }
.adm-table td {
    padding:10px 14px; text-align:center; color:var(--adm-text);
    border-bottom: 1px solid var(--adm-border-row);
    transition:background .15s;
}
.adm-table tbody tr:hover td { background: var(--adm-surface-row); }
.adm-table tbody tr:first-child td { color:var(--adm-gold); font-weight:700; }
.sign-container { display:none; flex-direction:column; align-items:center; padding:24px; gap:6px; }
.sign { border-top:2px solid rgba(200,155,0,.60); padding:4px 28px; font-size:.78rem; letter-spacing:.10em; color:var(--adm-text); }
body.adm-light .sign { border-top-color:rgba(140,90,0,.50); }

/* ── Section text (uses token so it flips in light) ── */
.adm-section-sub  { font-size:.65rem; letter-spacing:.22em; text-transform:uppercase; color:var(--adm-muted); margin:0 0 2px; }
.adm-section-title { font-family:'Orbitron',sans-serif; font-size:1.0rem; font-weight:700; color:var(--adm-text); margin:0; }

/* ── Navbar override ── */
#app .navbar {
    background: var(--adm-navbar-bg) !important;
    border-bottom: 1px solid var(--adm-navbar-bdr) !important;
    backdrop-filter:blur(20px) !important;
    box-shadow:0 2px 30px rgba(60,0,160,.20) !important;
    position:relative; z-index:100;
}
body.adm-light #app .navbar { box-shadow:0 2px 20px rgba(120,60,200,.12) !important; }

/* ── Round 2 Selector ── */
.adm-r2-selector-wrap {
    background: var(--adm-surface); border: 1px solid rgba(200,155,0,.35);
    border-radius: var(--adm-radius-sm); overflow: hidden;
    animation: admFadeIn .4s ease both;
}
.adm-r2-selector-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 12px; padding: 14px 20px;
    background: var(--adm-surface-head);
    border-bottom: 1px solid rgba(200,155,0,.28);
}
.adm-r2-selector-title {
    font-family: 'Orbitron', sans-serif; font-size: .82rem;
    font-weight: 700; color: var(--adm-gold); letter-spacing: .06em;
}
.adm-r2-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.adm-r2-counter {
    padding: 6px 14px; border-radius: 50px;
    background: rgba(120,85,0,.25); border: 1px solid rgba(200,155,0,.35);
    font-family: 'Rajdhani', sans-serif; font-size: .85rem; font-weight: 700;
    color: var(--adm-gold); white-space: nowrap; transition: var(--adm-transition);
}
.adm-r2-counter.is-full { background: rgba(0,120,80,.28); border-color: rgba(0,200,140,.45); color: #00e5b0; }
body.adm-light .adm-r2-counter { background:rgba(150,100,0,.10); border-color:rgba(160,110,0,.30); color:#7a5200; }
body.adm-light .adm-r2-counter.is-full { background:rgba(0,120,80,.10); border-color:rgba(0,160,110,.30); color:#005f48; }
.adm-r2-table tbody tr { cursor: pointer; }
.adm-r2-table tbody tr.r2-selected td { background: rgba(120,85,0,.22) !important; }
body.adm-light .adm-r2-table tbody tr.r2-selected td { background: rgba(200,160,20,.12) !important; }
.adm-r2-rank-badge {
    display: inline-block; min-width: 28px; padding: 2px 8px;
    border-radius: 50px; font-weight: 700; font-size: .8rem;
    background: rgba(120,85,0,.28); border: 1px solid rgba(200,155,0,.40); color: var(--adm-gold);
}
.adm-r2-status {
    padding: 12px 20px; text-align: center;
    font-family: 'Rajdhani', sans-serif; font-size: .9rem; font-weight: 600;
    border-top: 1px solid rgba(200,155,0,.22);
}
.adm-r2-status.success { color: #00e5b0; background: rgba(0,80,60,.25); }
.adm-r2-status.error   { color: #ff6688; background: rgba(120,0,40,.25); }
.adm-r2-status.loading { color: var(--adm-gold); background: rgba(120,85,0,.18); }
body.adm-light .adm-r2-status.success { color: #005f48; background: rgba(0,120,80,.10); }
body.adm-light .adm-r2-status.error   { color: #9a0040; background: rgba(180,40,80,.10); }
body.adm-light .adm-r2-status.loading { color: #7a5200; background: rgba(150,100,0,.10); }

/* ── Final Selector (rose/teal) ── */
.adm-final-selector-wrap {
    background: var(--adm-surface); border: 1px solid rgba(220,80,140,.32);
    border-radius: var(--adm-radius-sm); overflow: hidden;
    animation: admFadeIn .4s ease both;
}
.adm-final-selector-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 12px; padding: 14px 20px;
    background: var(--adm-surface-head);
    border-bottom: 1px solid rgba(220,80,140,.22);
}
.adm-final-selector-title {
    font-family: 'Orbitron', sans-serif; font-size: .82rem;
    font-weight: 700; color: #ff88cc; letter-spacing: .06em;
}
body.adm-light .adm-final-selector-title { color: #aa003a; }
.adm-final-counter {
    padding: 6px 14px; border-radius: 50px;
    background: rgba(160,0,80,.22); border: 1px solid rgba(220,80,140,.35);
    font-family: 'Rajdhani', sans-serif; font-size: .85rem; font-weight: 700;
    color: #ff88cc; white-space: nowrap; transition: var(--adm-transition);
}
.adm-final-counter.is-full { background: rgba(0,120,80,.28); border-color: rgba(0,200,140,.45); color: #00e5b0; }
body.adm-light .adm-final-counter { background:rgba(180,40,80,.10); border-color:rgba(200,50,100,.30); color:#aa003a; }
body.adm-light .adm-final-counter.is-full { background:rgba(0,120,80,.10); border-color:rgba(0,160,110,.30); color:#005f48; }
.adm-final-table tbody tr { cursor: pointer; }
.adm-final-table tbody tr.final-selected td { background: rgba(160,0,80,.18) !important; }
body.adm-light .adm-final-table tbody tr.final-selected td { background: rgba(200,50,100,.10) !important; }
.adm-final-rank-badge {
    display: inline-block; min-width: 28px; padding: 2px 8px;
    border-radius: 50px; font-weight: 700; font-size: .8rem;
    background: rgba(160,0,80,.25); border: 1px solid rgba(220,80,140,.40); color: #ff88cc;
}
body.adm-light .adm-final-rank-badge { background:rgba(180,40,80,.10); border-color:rgba(200,50,100,.35); color:#aa003a; }
.adm-final-status {
    padding: 12px 20px; text-align: center;
    font-family: 'Rajdhani', sans-serif; font-size: .9rem; font-weight: 600;
    border-top: 1px solid rgba(220,80,140,.18);
}
.adm-final-status.success { color: #00e5b0; background: rgba(0,80,60,.25); }
.adm-final-status.error   { color: #ff6688; background: rgba(120,0,40,.25); }
.adm-final-status.loading { color: #ff88cc; background: rgba(120,0,60,.18); }
body.adm-light .adm-final-status.success { color: #005f48; background: rgba(0,120,80,.10); }
body.adm-light .adm-final-status.error   { color: #9a0040; background: rgba(180,40,80,.10); }
body.adm-light .adm-final-status.loading { color: #aa003a; background: rgba(160,30,70,.08); }

/* ══════════════════════════════════════════════════
   GOLDEN FINAL EVENT THEME
   ══════════════════════════════════════════════════ */

/* Tab nav — golden */
.adm-tab--golden::after { background: linear-gradient(90deg, #ffe066, #f5c842, #c9960a, #f5c842, #ffe066); background-size:300% 100%; animation: goldTextShimmer 3s linear infinite; }
.adm-tab--golden.is-active { background: rgba(120,85,0,.32); border-color: rgba(220,170,0,.55); box-shadow: 0 0 28px rgba(200,150,0,.35); }
.adm-tab--golden.is-active .adm-tab-icon { background: rgba(140,95,0,.42); color: #ffe066; box-shadow: 0 0 18px rgba(220,170,0,.55); animation: goldenIconPulse 2s ease-in-out infinite; }
.adm-tab--golden.is-active .adm-tab-label { color: #f5c842; text-shadow: 0 0 10px rgba(220,170,0,.60); }
.adm-tab--golden.is-active .adm-tab-sub   { color: rgba(240,200,80,.75); }
body.adm-light .adm-tab--golden.is-active { background:rgba(255,250,220,.96); border-color:rgba(180,130,0,.45); box-shadow:0 4px 22px rgba(170,120,0,.18); }
body.adm-light .adm-tab--golden.is-active .adm-tab-icon { background:rgba(180,130,0,.14); color:#7a4f00; animation:none; }
body.adm-light .adm-tab--golden.is-active .adm-tab-label { color:#7a4f00; text-shadow:none; }
body.adm-light .adm-tab--golden.is-active .adm-tab-sub   { color:rgba(100,65,0,.60); }

/* Panel */
.adm-panel--golden {
    background: linear-gradient(135deg, rgba(80,55,0,.38) 0%, rgba(50,32,0,.44) 100%);
    border: 1px solid rgba(200,150,0,.38);
    box-shadow: 0 0 60px rgba(200,140,0,.14), inset 0 0 80px rgba(140,90,0,.08);
}
.adm-panel--golden::before {
    background: linear-gradient(90deg,#4a2e00,#c9960a,#ffe066,#fff4a0,#f5c842,#ffe066,#c9960a,#4a2e00);
    background-size: 400% 100%;
    animation: admBarShimmer 2.2s linear infinite;
}
body.adm-light .adm-panel--golden {
    background: linear-gradient(135deg, rgba(255,250,215,.96) 0%, rgba(255,252,225,.98) 100%);
    border-color: rgba(180,128,0,.42);
    box-shadow: 0 4px 32px rgba(160,110,0,.16), inset 0 0 50px rgba(200,150,0,.06);
}

/* Section icon */
.adm-section-icon.golden {
    background: rgba(130,88,0,.38);
    color: #f5c842;
    box-shadow: 0 0 20px rgba(220,158,0,.55), 0 0 40px rgba(200,128,0,.28);
    animation: goldenIconPulse 2s ease-in-out infinite;
}
body.adm-light .adm-section-icon.golden { background:rgba(180,130,0,.14); color:#8a5f00; box-shadow:0 0 14px rgba(190,140,0,.28); animation:none; }
@keyframes goldenIconPulse {
    0%,100% { box-shadow: 0 0 18px rgba(220,160,0,.45), 0 0 36px rgba(200,130,0,.22); }
    50%      { box-shadow: 0 0 30px rgba(255,210,0,.75), 0 0 60px rgba(220,160,0,.42); }
}

/* Shimmer title text */
.adm-golden-title {
    background: linear-gradient(90deg, #f5c842, #fff4a0, #c9960a, #ffe066, #f5c842);
    background-size: 300% 100%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: goldTextShimmer 3s linear infinite;
}
@keyframes goldTextShimmer { 0%{background-position:0% 0} 100%{background-position:300% 0} }
body.adm-light .adm-golden-title {
    background: linear-gradient(90deg, #7a4f00, #b87800, #5a3600, #c9960a, #7a4f00);
    background-size: 300% 100%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: goldTextShimmerLight 3s linear infinite;
}
@keyframes goldTextShimmerLight { 0%{background-position:0% 0} 100%{background-position:300% 0} }

/* Button */
.adm-btn--gold-final {
    background: linear-gradient(135deg, rgba(120,80,0,.58) 0%, rgba(80,50,0,.52) 100%);
    border: 1px solid rgba(220,162,0,.58);
    color: #ffe98a;
    text-shadow: 0 0 8px rgba(220,162,0,.60);
    animation: goldBtnPulse 2.5s ease-in-out infinite;
}
.adm-btn--gold-final:hover {
    background: linear-gradient(135deg, rgba(170,118,0,.68) 0%, rgba(130,88,0,.62) 100%);
    box-shadow: 0 0 30px rgba(220,165,0,.60);
    color: #fff4a0;
}
@keyframes goldBtnPulse {
    0%,100% { box-shadow: 0 0 12px rgba(200,140,0,.28); }
    50%      { box-shadow: 0 0 26px rgba(230,168,0,.55); }
}
body.adm-light .adm-btn--gold-final { background:rgba(180,130,0,.12); border-color:rgba(180,130,0,.45); color:#7a4f00; text-shadow:none; box-shadow:0 0 10px rgba(180,130,0,.16); animation:none; }
body.adm-light .adm-btn--gold-final:hover { background:rgba(200,150,0,.20); box-shadow:0 0 20px rgba(180,130,0,.32); }

/* ── PDF Export Button ── */
.adm-pdf-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 16px; border-radius: 10px; text-decoration: none;
    font-family: 'Rajdhani', sans-serif; font-size: .82rem; font-weight: 700;
    letter-spacing: .04em; white-space: nowrap;
    background: linear-gradient(135deg, rgba(180,10,10,.55) 0%, rgba(120,0,0,.50) 100%);
    border: 1px solid rgba(255,80,80,.45);
    color: #ffb3b3;
    transition: var(--adm-transition);
    animation: pdfBtnPulse 3s ease-in-out infinite;
}
.adm-pdf-btn:hover {
    background: linear-gradient(135deg, rgba(210,20,20,.70) 0%, rgba(160,0,0,.65) 100%);
    box-shadow: 0 0 24px rgba(255,60,60,.50);
    color: #fff;
    text-decoration: none;
}
@keyframes pdfBtnPulse {
    0%,100% { box-shadow: 0 0 8px rgba(220,40,40,.25); }
    50%      { box-shadow: 0 0 20px rgba(255,60,60,.50); }
}
body.adm-light .adm-pdf-btn {
    background: rgba(200,0,0,.10);
    border-color: rgba(200,40,40,.38);
    color: #aa0000;
    animation: none;
    box-shadow: 0 0 8px rgba(200,0,0,.12);
}
body.adm-light .adm-pdf-btn:hover {
    background: rgba(200,0,0,.18);
    box-shadow: 0 0 18px rgba(200,0,0,.28);
    color: #880000;
}

/* Crown banner */
.adm-golden-crown-banner {
    display: flex; align-items: center; justify-content: center; gap: 16px;
    padding: 12px 0 2px;
}
.adm-golden-crown {
    font-size: 1.8rem; color: #f5c842;
    filter: drop-shadow(0 0 10px rgba(255,200,0,.85));
    animation: crownBlink 1.8s ease-in-out infinite;
}
@keyframes crownBlink {
    0%,100% { filter:drop-shadow(0 0 8px rgba(240,180,0,.70)); transform:scale(1); }
    50%      { filter:drop-shadow(0 0 20px rgba(255,215,0,.95)); transform:scale(1.12); }
}
.adm-golden-star {
    font-size: 1.0rem; color: #ffe066;
    animation: starBlink 1.2s ease-in-out infinite alternate;
}
.adm-golden-star:last-child { animation-delay: .6s; }
@keyframes starBlink { from{opacity:.4;transform:scale(.8)} to{opacity:1;transform:scale(1.2)} }
.adm-golden-title-banner {
    font-family: 'Orbitron', sans-serif; font-size: .78rem; font-weight: 700;
    letter-spacing: .12em; text-transform: uppercase;
    background: linear-gradient(90deg, #f5c842, #fff4a0, #c9960a, #ffe066, #f5c842);
    background-size: 300% 100%;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    animation: goldTextShimmer 3s linear infinite;
}
body.adm-light .adm-golden-title-banner {
    background: linear-gradient(90deg, #7a4f00, #c98800, #5a3600, #b87800, #7a4f00);
    background-size: 300% 100%;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
body.adm-light .adm-golden-crown { filter:drop-shadow(0 0 6px rgba(180,130,0,.55)); animation:none; color:#8a5f00; }
body.adm-light .adm-golden-star  { color:#b87800; animation:none; }

/* Table wrapping glow */
.adm-golden-table-wrap {
    border: 1px solid rgba(200,145,0,.32) !important;
    box-shadow: 0 0 36px rgba(180,122,0,.16) !important;
}
body.adm-light .adm-golden-table-wrap { border-color:rgba(175,125,0,.32) !important; box-shadow:0 0 22px rgba(160,112,0,.12) !important; }

/* Header */
.adm-golden-header .adm-table-title { color: #f5c842; text-shadow: 0 0 12px rgba(220,162,0,.58); }
body.adm-light .adm-golden-header .adm-table-title { color: #7a4f00; text-shadow: none; }

/* Table head */
.adm-golden-table thead th {
    background: linear-gradient(135deg, rgba(100,68,0,.52) 0%, rgba(60,38,0,.58) 100%) !important;
    color: #ffe066 !important;
    border-bottom: 2px solid rgba(220,162,0,.42) !important;
    text-shadow: 0 0 8px rgba(200,142,0,.52);
}
body.adm-light .adm-golden-table thead th {
    background: linear-gradient(135deg, rgba(205,162,0,.14) 0%, rgba(162,120,0,.20) 100%) !important;
    color: #6b4400 !important; text-shadow: none;
    border-bottom-color: rgba(180,132,0,.38) !important;
}

/* Row colours — Rank 1 Gold */
#final-rank-table tr.final-top1 td {
    background: linear-gradient(90deg, rgba(175,128,0,.30) 0%, rgba(145,98,0,.22) 50%, rgba(175,128,0,.30) 100%) !important;
    color: #fff4a0 !important; font-weight: 700;
    animation: goldRowGlow 2s ease-in-out infinite;
    border-bottom: 1px solid rgba(220,162,0,.32) !important;
}
@keyframes goldRowGlow {
    0%,100% { box-shadow: inset 0 0 30px rgba(200,140,0,.12); }
    50%      { box-shadow: inset 0 0 55px rgba(225,165,0,.26); }
}
/* Rank 2 Silver */
#final-rank-table tr.final-top2 td {
    background: linear-gradient(90deg, rgba(138,138,158,.22) 0%, rgba(100,100,118,.16) 50%, rgba(138,138,158,.22) 100%) !important;
    color: #e8e8f0 !important;
    border-bottom: 1px solid rgba(175,175,198,.25) !important;
}
/* Rank 3 Bronze */
#final-rank-table tr.final-top3 td {
    background: linear-gradient(90deg, rgba(138,78,18,.24) 0%, rgba(98,52,8,.18) 50%, rgba(138,78,18,.24) 100%) !important;
    color: #f0c088 !important;
    border-bottom: 1px solid rgba(178,118,38,.28) !important;
}
body.adm-light #final-rank-table tr.final-top1 td { background: linear-gradient(90deg, rgba(220,168,0,.14) 0%, rgba(198,138,0,.10) 50%, rgba(220,168,0,.14) 100%) !important; color:#6b3f00 !important; animation:none; }
body.adm-light #final-rank-table tr.final-top2 td { background: linear-gradient(90deg, rgba(148,148,168,.14) 0%, rgba(118,118,138,.10) 50%, rgba(148,148,168,.14) 100%) !important; color:#44446a !important; }
body.adm-light #final-rank-table tr.final-top3 td { background: linear-gradient(90deg, rgba(148,88,18,.12) 0%, rgba(118,62,8,.08) 50%, rgba(148,88,18,.12) 100%) !important; color:#6a3800 !important; }

/* Rank badges */
.adm-rank-gold {
    display:inline-flex; align-items:center; gap:5px; padding:4px 12px; border-radius:50px;
    font-weight:700; font-size:.82rem;
    background:rgba(178,130,0,.38); border:1px solid rgba(240,182,0,.58); color:#ffe068;
    text-shadow:0 0 8px rgba(222,162,0,.65);
    animation:rankGoldBlink 1.6s ease-in-out infinite;
}
@keyframes rankGoldBlink {
    0%,100% { box-shadow:0 0 8px rgba(222,162,0,.32); transform:scale(1); }
    50%      { box-shadow:0 0 20px rgba(255,205,0,.68); transform:scale(1.08); }
}
.adm-rank-silver {
    display:inline-flex; align-items:center; gap:5px; padding:4px 12px; border-radius:50px;
    font-weight:700; font-size:.82rem;
    background:rgba(148,148,168,.30); border:1px solid rgba(200,200,222,.52); color:#e0e0ee;
}
.adm-rank-bronze {
    display:inline-flex; align-items:center; gap:5px; padding:4px 12px; border-radius:50px;
    font-weight:700; font-size:.82rem;
    background:rgba(138,78,18,.30); border:1px solid rgba(188,120,38,.52); color:#f0c490;
}
body.adm-light .adm-rank-gold   { background:rgba(200,152,0,.12); border-color:rgba(180,132,0,.46); color:#7a4f00; text-shadow:none; animation:none; }
body.adm-light .adm-rank-silver { background:rgba(138,138,158,.12); border-color:rgba(158,158,178,.40); color:#44446a; }
body.adm-light .adm-rank-bronze { background:rgba(138,78,18,.10); border-color:rgba(158,100,28,.38); color:#6a3800; }

/* ══ Online Monitor Tab ══════════════════════════════════════════ */
.adm-tab--online::after { background: linear-gradient(90deg, #00e5b0, #00a878, #00e5b0); background-size:300% 100%; animation: admBarShimmer 3s linear infinite; }
.adm-tab--online.is-active { background: rgba(0,100,75,.28); border-color: rgba(0,220,160,.50); box-shadow: 0 0 26px rgba(0,190,140,.30); }
.adm-tab--online.is-active .adm-tab-icon { background: rgba(0,120,88,.40); color: #00ffc8; box-shadow: 0 0 16px rgba(0,210,155,.45); }
.adm-tab--online.is-active .adm-tab-label { color: #00ffc8; }
.adm-tab--online.is-active .adm-tab-sub   { color: rgba(0,230,180,.70); }
body.adm-light .adm-tab--online.is-active { background:rgba(220,255,248,.95); border-color:rgba(0,170,125,.42); box-shadow:0 4px 22px rgba(0,160,115,.16); }
body.adm-light .adm-tab--online.is-active .adm-tab-icon { background:rgba(0,160,115,.12); color:#005f48; }
body.adm-light .adm-tab--online.is-active .adm-tab-label { color:#005f48; }
body.adm-light .adm-tab--online.is-active .adm-tab-sub   { color:rgba(0,120,88,.60); }

.adm-online-badge {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 18px; height: 18px; padding: 0 4px;
    background: rgba(0,210,150,.30); border: 1px solid rgba(0,210,150,.55);
    border-radius: 99px; font-size: .68rem; font-weight: 700;
    color: #00ffc8; vertical-align: middle; margin-left: 4px;
    transition: background .3s;
}
body.adm-light .adm-online-badge { background:rgba(0,160,110,.12); border-color:rgba(0,160,110,.40); color:#005f48; }

.adm-panel--online { background: rgba(0,50,38,.26); border: 1px solid rgba(0,200,148,.22); flex-direction: column; gap: 20px; }
.adm-panel--online::before { background: linear-gradient(90deg,#006644,#00c890,#00ffcc,#00c890,#006644); background-size:300% 100%; animation: admBarShimmer 3s linear infinite; }
body.adm-light .adm-panel--online { background:rgba(224,255,248,.90); border-color:rgba(0,175,130,.22); box-shadow:0 4px 24px rgba(0,160,115,.10); }

.adm-section-icon.online { background:rgba(0,120,90,.30); color:#00e5b0; box-shadow:0 0 16px rgba(0,200,150,.30); }
body.adm-light .adm-section-icon.online { background:rgba(0,150,110,.12); color:#005f48; box-shadow:0 0 12px rgba(0,150,110,.16); }

/* refresh button */
.adm-btn--online-refresh { background:rgba(0,100,75,.32); border:1px solid rgba(0,200,148,.45); color:#00e5b0; }
.adm-btn--online-refresh:hover { background:rgba(0,130,100,.44); box-shadow:0 0 18px rgba(0,200,148,.38); }
body.adm-light .adm-btn--online-refresh { background:rgba(0,140,100,.12); border-color:rgba(0,160,115,.38); color:#005f48; }

/* pulse dot */
.adm-online-pulse {
    display: inline-block; width: 10px; height: 10px;
    border-radius: 50%; background: #00e5b0;
    box-shadow: 0 0 8px rgba(0,230,176,.70);
    animation: onlinePulse 1.4s ease-in-out infinite;
}
@keyframes onlinePulse { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.5);opacity:.50} }
.adm-online-status-text { font-size:.78rem; color:var(--adm-muted); letter-spacing:.04em; }
body.adm-light .adm-online-status-text { color:#5533aa; }

/* cards grid */
.adm-online-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 14px;
}

.adm-online-loading {
    grid-column: 1 / -1;
    display: flex; align-items: center; justify-content: center;
    gap: 12px; padding: 40px; color: var(--adm-muted); font-size: .9rem;
}
.adm-online-spinner {
    width: 20px; height: 20px; border-radius: 50%;
    border: 2px solid rgba(0,210,150,.20);
    border-top-color: #00e5b0;
    animation: spin 0.8s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* judge card */
.adm-judge-card {
    background: rgba(0,0,0,.22);
    border: 1px solid rgba(80,80,80,.25);
    border-radius: var(--adm-radius-sm);
    padding: 16px 14px;
    display: flex; flex-direction: column; gap: 8px;
    transition: var(--adm-transition);
    animation: admFadeIn .35s ease both;
}
.adm-judge-card.is-online {
    background: rgba(0,80,60,.28);
    border-color: rgba(0,210,155,.40);
    box-shadow: 0 0 18px rgba(0,190,140,.20);
}
body.adm-light .adm-judge-card { background:rgba(255,255,255,.85); border-color:rgba(180,180,180,.30); }
body.adm-light .adm-judge-card.is-online { background:rgba(220,255,245,.92); border-color:rgba(0,170,125,.38); box-shadow:0 0 14px rgba(0,160,115,.14); }

.adm-judge-card-top { display:flex; align-items:center; gap:10px; }
.adm-judge-avatar {
    width: 38px; height: 38px; border-radius: 50%;
    display: flex; align-items:center; justify-content:center;
    font-size: 1rem; font-weight: 700; flex-shrink: 0;
    background: rgba(80,40,140,.35); color: #cc88ff;
    border: 1px solid rgba(140,80,255,.30);
}
.adm-judge-card.is-online .adm-judge-avatar {
    background: rgba(0,110,82,.40); color: #00ffc8;
    border-color: rgba(0,200,148,.40);
}
body.adm-light .adm-judge-avatar { background:rgba(160,80,220,.12); color:#7700cc; border-color:rgba(160,80,220,.30); }
body.adm-light .adm-judge-card.is-online .adm-judge-avatar { background:rgba(0,150,110,.12); color:#005f48; border-color:rgba(0,160,115,.35); }

.adm-judge-info { flex: 1; min-width: 0; }
.adm-judge-name { font-size:.88rem; font-weight:700; color:var(--adm-text); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.adm-judge-email { font-size:.70rem; color:var(--adm-muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }

.adm-judge-status-row { display:flex; align-items:center; gap:6px; }
.adm-status-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
.adm-status-dot.online  { background:#00e5b0; box-shadow:0 0 6px rgba(0,210,160,.70); animation:onlinePulse 1.6s ease infinite; }
.adm-status-dot.offline { background:#555; }
.adm-status-label { font-size:.72rem; letter-spacing:.06em; text-transform:uppercase; font-weight:600; }
.adm-status-label.online  { color:#00e5b0; }
.adm-status-label.offline { color:#666; }
body.adm-light .adm-status-label.online  { color:#005f48; }
body.adm-light .adm-status-label.offline { color:#888; }

.adm-judge-lastseen { font-size:.68rem; color:var(--adm-muted); margin-left:auto; white-space:nowrap; }

/* summary bar */
.adm-online-summary {
    display: flex; align-items: center; gap: 20px; flex-wrap: wrap;
    padding: 10px 4px 0;
    border-top: 1px solid rgba(255,255,255,.07);
    font-size: .78rem; color: var(--adm-muted);
}
body.adm-light .adm-online-summary { border-top-color:rgba(0,0,0,.08); color:#5533aa; }
.adm-online-summary-item { display:flex; align-items:center; gap:6px; }
</style>


<script>
/* ── Tab switching ── */
document.querySelectorAll('.adm-tab').forEach(function(tab) {
    tab.addEventListener('click', function() {
        var target = this.dataset.tab;
        document.querySelectorAll('.adm-tab').forEach(function(t) {
            t.classList.remove('is-active');
            t.setAttribute('aria-selected', 'false');
        });
        document.querySelectorAll('.adm-tab-panel').forEach(function(p) {
            p.classList.remove('is-active');
        });
        this.classList.add('is-active');
        this.setAttribute('aria-selected', 'true');
        var panel = document.getElementById('tab-' + target);
        if (panel) panel.classList.add('is-active');
    });
});

/* ── Online Judges Monitor ── */
(function() {
    var POLL_INTERVAL = 30000; // 30 seconds
    var pollTimer = null;

    function timeAgo(unixTs) {
        var diff = Math.floor(Date.now() / 1000) - unixTs;
        if (diff < 10)  return 'just now';
        if (diff < 60)  return diff + 's ago';
        if (diff < 3600) return Math.floor(diff / 60) + 'm ago';
        return Math.floor(diff / 3600) + 'h ago';
    }

    function initials(name) {
        return name.split(' ').map(function(w){ return w[0]; }).join('').toUpperCase().slice(0,2);
    }

    function renderCards(data) {
        var grid    = document.getElementById('online-cards-grid');
        var loading = document.getElementById('online-loading');
        var onlineIds = data.online_ids.map(function(id){ return parseInt(id); });
        var onlineCount = 0;

        // remove loading spinner
        if (loading) loading.remove();

        // clear old cards
        grid.innerHTML = '';

        // sort: online first
        var users = data.users.slice().sort(function(a, b) {
            var aOn = onlineIds.indexOf(a.id) !== -1 ? 0 : 1;
            var bOn = onlineIds.indexOf(b.id) !== -1 ? 0 : 1;
            return aOn - bOn;
        });

        users.forEach(function(user) {
            var isOnline = onlineIds.indexOf(user.id) !== -1;
            if (isOnline) onlineCount++;

            var lastSeen = data.last_seen[user.id];
            var lastSeenText = lastSeen ? timeAgo(lastSeen.last_activity) : 'never';

            var card = document.createElement('div');
            card.className = 'adm-judge-card' + (isOnline ? ' is-online' : '');
            card.innerHTML =
                '<div class="adm-judge-card-top">' +
                    '<div class="adm-judge-avatar">' + initials(user.name) + '</div>' +
                    '<div class="adm-judge-info">' +
                        '<div class="adm-judge-name">' + user.name + '</div>' +
                        '<div class="adm-judge-email">' + user.email + '</div>' +
                    '</div>' +
                '</div>' +
                '<div class="adm-judge-status-row">' +
                    '<span class="adm-status-dot ' + (isOnline ? 'online' : 'offline') + '"></span>' +
                    '<span class="adm-status-label ' + (isOnline ? 'online' : 'offline') + '">' + (isOnline ? 'Online' : 'Offline') + '</span>' +
                    '<span class="adm-judge-lastseen">' + lastSeenText + '</span>' +
                '</div>';
            grid.appendChild(card);
        });

        // update counters
        var offlineCount = users.length - onlineCount;
        document.getElementById('count-online').textContent  = onlineCount;
        document.getElementById('count-offline').textContent = offlineCount;

        // update tab badge
        var badge = document.getElementById('tab-online-count');
        if (badge) badge.textContent = onlineCount;

        // last updated
        var now = new Date();
        document.getElementById('online-last-updated').textContent =
            now.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit', second:'2-digit'});
    }

    function fetchOnline() {
        document.getElementById('online-status-text').textContent = 'Refreshing…';
        fetch('{{ route("admin.online_users") }}')
            .then(function(r){ return r.json(); })
            .then(function(data){
                renderCards(data);
                document.getElementById('online-status-text').textContent = 'Auto-refreshing every 30s';
            })
            .catch(function(){
                document.getElementById('online-status-text').textContent = 'Refresh failed — retrying…';
            });
    }

    function startPolling() {
        fetchOnline();
        pollTimer = setInterval(fetchOnline, POLL_INTERVAL);
    }

    // start when tab is clicked; stop when leaving
    document.querySelectorAll('.adm-tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            if (this.dataset.tab === 'online') {
                startPolling();
            } else {
                clearInterval(pollTimer);
            }
        });
    });

    // manual refresh button
    document.getElementById('btn-refresh-online').addEventListener('click', function() {
        clearInterval(pollTimer);
        startPolling();
    });
})();

/* ── Light / dark toggle ── */
(function() {
    var btn  = document.getElementById('adm-theme-toggle');
    var icon = document.getElementById('adm-theme-icon');
    var LIGHT = 'adm-light';

    function applyTheme(isLight) {
        document.body.classList.toggle(LIGHT, isLight);
        icon.className = isLight ? 'bi bi-moon-stars-fill' : 'bi bi-sun-fill';
        btn.title = isLight ? 'Switch to dark mode' : 'Switch to light mode';
    }

    // restore saved preference
    var saved = localStorage.getItem('adm-theme');
    applyTheme(saved === 'light');

    btn.addEventListener('click', function() {
        var isLight = !document.body.classList.contains(LIGHT);
        applyTheme(isLight);
        localStorage.setItem('adm-theme', isLight ? 'light' : 'dark');
    });
})();
</script>

@endsection

@push('scripts')
    <script>
        function printDiv() {
            var printPreliminaryContents = document.getElementById("print-preliminary-ranking").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} }</style></head>`
            );
            a.document.write('<body> <h1>Pre-judged Results<br>');
            a.document.write(printPreliminaryContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printCorination() {
            var printCorinationRank = document.getElementById("swimsuit-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write('<body><br>');
            a.document.write(printCorinationRank);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printSnapTalk(){
            var printCorinationRank = document.getElementById("snap-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write('<body><br>');
            a.document.write(printCorinationRank);
            a.document.write('</body></html>');
            a.document.close();
            a.print();

        }

        function printOverAll() {
            var printoverall = document.getElementById("overall-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write('<body> <h1>Top 10 Overall<br>');
            a.document.write(printoverall);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printFinal() {
            var printFinal = document.getElementById("final-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .final-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write(`<body> <h1>Top 5 Final Results<br>`);
            a.document.write(printFinal);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

    </script>
    <script type="module">

        


        ///preliminary rankings
        $("#preliminary-ranking-close").click(function() {
            $('#print-preliminary-ranking').attr("hidden", true);
        });

        $(".overall-ranking-close").click(function() {
            $('#overall-ranking-container').attr('hidden', true);
            $('#r2-selector-wrap').attr('hidden', true);
        });

        $(".swimsuit-ranking-close").click(function() {
            $('#swimsuit-ranking-container').attr("hidden", true);
        });

        $(".final-ranking-close").click(function() {
            $('#final-ranking-container').attr("hidden", true);
        });

        $('.snap-ranking-close').click(function() {
            $('#snap-ranking-container').attr('hidden', true);
            $('#final-selector-wrap').attr('hidden', true);
        });

        

        // prejudge grade ranking
        $("#preliminary-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('preliminary_ranking') }}',
                    success: function(response) {
                        console.log(response);
                        $('#preliminary-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.row_id);
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank}</td>
                                    <td>${value.total_ranking}</td>

                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>

                                    <td>${value.closed_interview}</td>
                                    <td>${value.photogenic}</td>
                                    <td>${value.white_collection}</td>
                                    <td>${value.tourism_video}</td>
                                    <td>${value.talent}</td>
                                    <td>${value.filipiniana}</td>
                                    <td>${value.production_wear}</td>
                                    <td>${value.production_number}</td>
                                    <td>${value.runway}</td>
                                </tr>`);

                                

                            // Append the new row to the tbody with id 'rank-table'
                            $('#preliminary-rank-table').append(newRow);
                        });

                        $('#print-preliminary-ranking').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        ///coronation rankings

        //swimsuit rankings
        $("#swimsuit-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_swimsuit') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.rank_swimsuit);

                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_swimsuit}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_swimsuit}</td>
                                    <td>${value.Judge1_swimsuit_ranking}</td>
                                    <td>${value.Judge2_swimsuit_ranking}</td>
                                    <td>${value.Judge3_swimsuit_ranking}</td>
                                    <td>${value.Judge4_swimsuit_ranking}</td>
                                    <td>${value.Judge5_swimsuit_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Swimwear Ranking")
                        $('#swimsuit-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        //swimsuit rankings
        $("#gown-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_gown') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.rank_swimsuit);

                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_gown}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_gown}</td>
                                    <td>${value.Judge1_gown_ranking}</td>
                                    <td>${value.Judge2_gown_ranking}</td>
                                    <td>${value.Judge3_gown_ranking}</td>
                                    <td>${value.Judge4_gown_ranking}</td>
                                    <td>${value.Judge5_gown_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Gown Ranking")
                        $('#swimsuit-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        $("#snap-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_question') }}',
                    success: function(response) {
                        console.log(response);
                        $('#snap-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_question}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_question}</td>
                                    <td>${value.Judge1_question_ranking}</td>
                                    <td>${value.Judge2_question_ranking}</td>
                                    <td>${value.Judge3_question_ranking}</td>
                                    <td>${value.Judge4_question_ranking}</td>
                                    <td>${value.Judge5_question_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#snap-rank-table').append(newRow);
                        });
                        $('#snap-table').text("Statement Ranking")
                        $('#snap-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        $("#overall-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_final') }}',
                    success: function(response) {
                        console.log(response);
                        $('#overall-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.overall_ranking}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.total_ranking}</td>
                                    <td>${value.rank_swimsuit}</td>
                                    <td>${value.rank_gown}</td>
                                    <td>${value.preliminary_ranking}</td>
                                    
                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#overall-rank-table').append(newRow);
                        });
                        $('#overall-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });

        // ── Round 2 Selector ──
        var r2Data = [];

        /** Returns Swal background/color matching the current admin theme */
        function r2SwalTheme() {
            var light = document.body.classList.contains('adm-light');
            return {
                background: light ? '#ece6ff' : '#0d0030',
                color:      light ? '#1a0040' : '#f0ebff'
            };
        }

        function r2UpdateCounter() {
            var count = $('#r2-selector-table .r2-checkbox:checked').length;
            $('#r2-count').text(count);
            $('#r2-counter').toggleClass('is-full', count === 8);
            $('#r2-proceed').prop('disabled', count !== 8);
        }

        function r2BuildTable(data) {
            r2Data = data;
            $('#r2-selector-table').empty();
            // Reset proceed button and status every time the table is rebuilt
            $('#r2-proceed')
                .prop('disabled', true)
                .html('<i class="bi bi-arrow-right-circle-fill me-2"></i>Proceed to Round 2');
            $('#r2-status').attr('hidden', true).removeClass('success error loading').text('');
            $.each(data, function(i, v) {
                var rank = parseInt(v.overall_ranking);
                var checked = (rank >= 1 && rank <= 8);
                var row = $(`
                    <tr class="${checked ? 'r2-selected' : ''}" data-id="${v.id}" data-rank="${rank}">
                        <td style="width:42px"><input type="checkbox" class="r2-checkbox" ${checked ? 'checked' : ''} style="accent-color:var(--adm-gold);width:18px;height:18px;cursor:pointer;"></td>
                        <td><span class="adm-r2-rank-badge">${rank}</span></td>
                        <td>${v.contestant_number}</td>
                        <td style="text-align:left;font-weight:600">${v.contestant_name}</td>
                        <td>${v.total_ranking}</td>
                        <td>${v.rank_swimsuit}</td>
                        <td>${v.rank_gown}</td>
                        <td>${v.preliminary_ranking}</td>
                    </tr>`);
                $('#r2-selector-table').append(row);
            });
            r2UpdateCounter();
        }

        $('#open-r2-selector').click(function() {
            var btn = $(this);
            btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Loading...');
            $.ajax({
                type: 'GET',
                url: '{{ route('overall_final') }}',
                success: function(response) {
                    r2BuildTable(response.ranking);
                    var wrap = $('#r2-selector-wrap');
                    wrap.removeAttr('hidden');
                    btn.prop('disabled', false).html('<i class="bi bi-people-fill me-2"></i>Select for Round 2');
                    setTimeout(function() { wrap[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }, 80);
                },
                error: function() {
                    btn.prop('disabled', false).html('<i class="bi bi-people-fill me-2"></i>Select for Round 2');
                    var t = r2SwalTheme();
                    Swal.fire({
                        title: 'Rankings Not Ready',
                        text: 'Please generate the overall rankings first by clicking "View Overall".',
                        icon: 'warning',
                        background: t.background,
                        color: t.color,
                        confirmButtonColor: '#aa44ff',
                        confirmButtonText: 'Got it'
                    });
                }
            });
        });

        $('#r2-close').click(function() {
            $('#r2-selector-wrap').attr('hidden', true);
        });

        $('#r2-auto-select').click(function() {
            $('#r2-selector-table .r2-checkbox').prop('checked', false);
            $('#r2-selector-table tr').removeClass('r2-selected');
            var rows = $('#r2-selector-table tr').get().sort(function(a, b) {
                return parseInt($(a).data('rank')) - parseInt($(b).data('rank'));
            });
            var checked = 0;
            $.each(rows, function(i, row) {
                if (checked < 8) {
                    $(row).find('.r2-checkbox').prop('checked', true);
                    $(row).addClass('r2-selected');
                    checked++;
                }
            });
            r2UpdateCounter();
        });

        $(document).on('change', '.r2-checkbox', function() {
            var count = $('#r2-selector-table .r2-checkbox:checked').length;
            if (count > 8) {
                $(this).prop('checked', false);
            } else {
                $(this).closest('tr').toggleClass('r2-selected', $(this).is(':checked'));
            }
            r2UpdateCounter();
        });

        $(document).on('click', '#r2-selector-table tbody tr', function(e) {
            if (!$(e.target).is('input')) {
                var cb = $(this).find('.r2-checkbox');
                var newState = !cb.prop('checked');
                var count = $('#r2-selector-table .r2-checkbox:checked').length;
                if (newState && count >= 8) return;
                cb.prop('checked', newState);
                $(this).toggleClass('r2-selected', newState);
                r2UpdateCounter();
            }
        });

        $('#r2-proceed').click(function() {
            var selected = [];
            $('#r2-selector-table .r2-checkbox:checked').each(function() {
                selected.push($(this).closest('tr').data('id'));
            });
            var t = r2SwalTheme();
            if (selected.length !== 8) {
                Swal.fire({
                    title: 'Selection Incomplete',
                    text: 'You must select exactly 8 contestants to proceed to Round 2.',
                    icon: 'error',
                    background: t.background,
                    color: t.color,
                    confirmButtonColor: '#aa44ff',
                    confirmButtonText: 'OK'
                });
                return;
            }
            var btn = $(this);
            var status = $('#r2-status');
            Swal.fire({
                title: 'Proceed to Round 2?',
                html: 'This will replace all existing Round 2 data with the <strong>' + selected.length + ' selected contestants</strong>.<br><br>Any scores already entered for Round 2 will be <strong>cleared</strong>.',
                icon: 'question',
                background: t.background,
                color: t.color,
                showCancelButton: true,
                confirmButtonColor: '#00aa80',
                cancelButtonColor: '#660099',
                confirmButtonText: 'Yes, Proceed',
                cancelButtonText: 'Cancel'
            }).then(function(result) {
                if (!result.isConfirmed) return;
                btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Processing...');
                status.removeAttr('hidden').removeClass('success error').addClass('loading').text('Saving contestants to Round 2...');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('proceed_to_round2') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        contestant_ids: selected
                    },
                    success: function(response) {
                        var t2 = r2SwalTheme();
                        status.removeClass('loading error').addClass('success');
                        status.html('<i class="bi bi-check-circle-fill me-2"></i>' + response.message);
                        btn.html('<i class="bi bi-check-circle-fill me-2"></i>Round 2 Set!');
                        Swal.fire({
                            title: 'Done!',
                            text: response.message,
                            icon: 'success',
                            background: t2.background,
                            color: t2.color,
                            confirmButtonColor: '#00aa80',
                            timer: 3000,
                            timerProgressBar: true
                        });
                    },
                    error: function(err) {
                        var t2 = r2SwalTheme();
                        status.removeClass('loading success').addClass('error');
                        var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'An error occurred. Please try again.';
                        status.html('<i class="bi bi-exclamation-triangle-fill me-2"></i>' + msg);
                        btn.prop('disabled', false).html('<i class="bi bi-arrow-right-circle-fill me-2"></i>Proceed to Round 2');
                        Swal.fire({
                            title: 'Error',
                            text: msg,
                            icon: 'error',
                            background: t2.background,
                            color: t2.color,
                            confirmButtonColor: '#aa44ff'
                        });
                    }
                });
            }); // end Swal.fire .then()
        });

        // ── Final Selector (Top 3 from Snap Talk) ──
        var finalData = [];

        function finalUpdateCounter() {
            var count = $('#final-selector-table .final-checkbox:checked').length;
            $('#final-count').text(count);
            $('#final-counter').toggleClass('is-full', count === 3);
            $('#final-proceed').prop('disabled', count !== 3);
        }

        function finalBuildTable(data) {
            finalData = data;
            $('#final-selector-table').empty();
            $('#final-proceed')
                .prop('disabled', true)
                .html('<i class="bi bi-gem me-2"></i>Proceed to Final');
            $('#final-status').attr('hidden', true).removeClass('success error loading').text('');
            $.each(data, function(i, v) {
                var rank = parseInt(v.rank_question);
                var checked = (rank >= 1 && rank <= 3);
                var row = $(`
                    <tr class="${checked ? 'final-selected' : ''}" data-id="${v.id}" data-rank="${rank}">
                        <td style="width:42px"><input type="checkbox" class="final-checkbox" ${checked ? 'checked' : ''} style="accent-color:#ff88cc;width:18px;height:18px;cursor:pointer;"></td>
                        <td><span class="adm-final-rank-badge">${rank}</span></td>
                        <td>${v.contestant_number}</td>
                        <td style="text-align:left;font-weight:600">${v.contestant_name}</td>
                        <td>${v.Judge1_question_ranking}</td>
                        <td>${v.Judge2_question_ranking}</td>
                        <td>${v.Judge3_question_ranking}</td>
                        <td>${v.Judge4_question_ranking}</td>
                        <td>${v.Judge5_question_ranking}</td>
                        <td>${v.overall_ranking_question}</td>
                    </tr>`);
                $('#final-selector-table').append(row);
            });
            finalUpdateCounter();
        }

        $('#open-final-selector').click(function() {
            var btn = $(this);
            var wrap = $('#final-selector-wrap');
            btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Loading...');
            $.ajax({
                type: 'GET',
                url: '{{ route('overall_question') }}',
                success: function(response) {
                    finalBuildTable(response.ranking);
                    wrap.removeAttr('hidden');
                    btn.prop('disabled', false).html('<i class="bi bi-gem me-2"></i>Select for Final');
                    setTimeout(function() { wrap[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }, 80);
                },
                error: function() {
                    btn.prop('disabled', false).html('<i class="bi bi-gem me-2"></i>Select for Final');
                    var t = r2SwalTheme();
                    Swal.fire({
                        title: 'Rankings Not Ready',
                        text: 'Please generate the Snap Talk rankings first by clicking "View Rankings".',
                        icon: 'warning',
                        background: t.background,
                        color: t.color,
                        confirmButtonColor: '#aa44ff',
                        confirmButtonText: 'Got it'
                    });
                }
            });
        });

        $('#final-selector-close').click(function() {
            $('#final-selector-wrap').attr('hidden', true);
        });

        $('#final-auto-select').click(function() {
            $('#final-selector-table .final-checkbox').prop('checked', false);
            $('#final-selector-table tr').removeClass('final-selected');
            var rows = $('#final-selector-table tr').get().sort(function(a, b) {
                return parseInt($(a).data('rank')) - parseInt($(b).data('rank'));
            });
            var checked = 0;
            $.each(rows, function(i, row) {
                if (checked < 3) {
                    $(row).find('.final-checkbox').prop('checked', true);
                    $(row).addClass('final-selected');
                    checked++;
                }
            });
            finalUpdateCounter();
        });

        $(document).on('change', '.final-checkbox', function() {
            var count = $('#final-selector-table .final-checkbox:checked').length;
            if (count > 3) {
                $(this).prop('checked', false);
            } else {
                $(this).closest('tr').toggleClass('final-selected', $(this).is(':checked'));
            }
            finalUpdateCounter();
        });

        $(document).on('click', '#final-selector-table tbody tr', function(e) {
            if (!$(e.target).is('input')) {
                var cb = $(this).find('.final-checkbox');
                var newState = !cb.prop('checked');
                var count = $('#final-selector-table .final-checkbox:checked').length;
                if (newState && count >= 3) return;
                cb.prop('checked', newState);
                $(this).toggleClass('final-selected', newState);
                finalUpdateCounter();
            }
        });

        $('#final-proceed').click(function() {
            var selected = [];
            $('#final-selector-table .final-checkbox:checked').each(function() {
                selected.push($(this).closest('tr').data('id'));
            });
            var t = r2SwalTheme();
            if (selected.length !== 3) {
                Swal.fire({
                    title: 'Selection Incomplete',
                    text: 'You must select exactly 3 contestants to proceed to the Final Event.',
                    icon: 'error',
                    background: t.background,
                    color: t.color,
                    confirmButtonColor: '#aa44ff',
                    confirmButtonText: 'OK'
                });
                return;
            }
            var btn = $(this);
            var status = $('#final-status');
            Swal.fire({
                title: 'Proceed to Final Event?',
                html: 'This will set <strong>' + selected.length + ' contestants</strong> as finalists.<br><br>Any existing Final Event scores will be <strong>cleared</strong>.',
                icon: 'question',
                background: t.background,
                color: t.color,
                showCancelButton: true,
                confirmButtonColor: '#cc0055',
                cancelButtonColor: '#660099',
                confirmButtonText: 'Yes, Proceed to Final',
                cancelButtonText: 'Cancel'
            }).then(function(result) {
                if (!result.isConfirmed) return;
                btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Processing...');
                status.removeAttr('hidden').removeClass('success error').addClass('loading').text('Saving finalists...');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('proceed_to_final') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        contestant_ids: selected
                    },
                    success: function(response) {
                        var t2 = r2SwalTheme();
                        status.removeClass('loading error').addClass('success');
                        status.html('<i class="bi bi-check-circle-fill me-2"></i>' + response.message);
                        btn.html('<i class="bi bi-gem me-2"></i>Final Set!');
                        Swal.fire({
                            title: 'Done!',
                            text: response.message,
                            icon: 'success',
                            background: t2.background,
                            color: t2.color,
                            confirmButtonColor: '#00aa80',
                            timer: 3000,
                            timerProgressBar: true
                        });
                    },
                    error: function(err) {
                        var t2 = r2SwalTheme();
                        status.removeClass('loading success').addClass('error');
                        var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'An error occurred. Please try again.';
                        status.html('<i class="bi bi-exclamation-triangle-fill me-2"></i>' + msg);
                        btn.prop('disabled', false).html('<i class="bi bi-gem me-2"></i>Proceed to Final');
                        Swal.fire({
                            title: 'Error',
                            text: msg,
                            icon: 'error',
                            background: t2.background,
                            color: t2.color,
                            confirmButtonColor: '#aa44ff'
                        });
                    }
                });
            });
        });

        $("#final-ranking").click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('overall_winner') }}',
                success: function(response) {
                    $('#final-rank-table').empty();
                    $.each(response.ranking, function(key, value) {
                        var rank = parseInt(value.rank_final);
                        var rowClass = rank === 1 ? 'final-top1' : (rank === 2 ? 'final-top2' : 'final-top3');
                        var badge;
                        if (rank === 1) {
                            badge = '<span class="adm-rank-gold"><i class="bi bi-trophy-fill"></i> 1st</span>';
                        } else if (rank === 2) {
                            badge = '<span class="adm-rank-silver"><i class="bi bi-award-fill"></i> 2nd</span>';
                        } else {
                            badge = '<span class="adm-rank-bronze"><i class="bi bi-award"></i> 3rd</span>';
                        }
                        var newRow = $(`
                            <tr class="text-center ${rowClass}">
                                <td>${badge}</td>
                                <td>${value.contestant_number}</td>
                                <td style="text-align:left;font-weight:700">${value.contestant_name}</td>
                                <td>${value.overall_ranking_final}</td>
                                <td>${value.Judge1_final_ranking}</td>
                                <td>${value.Judge2_final_ranking}</td>
                                <td>${value.Judge3_final_ranking}</td>
                                <td>${value.Judge4_final_ranking}</td>
                                <td>${value.Judge5_final_ranking}</td>
                            </tr>`);
                        $('#final-rank-table').append(newRow);
                    });
                    $('#final-ranking-container').removeAttr('hidden');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });







        /* -- PDF Export with SweetAlert2 loading (fetch+blob) -- */
        document.getElementById('btn-export-pdf').addEventListener('click', function () {
            Swal.fire({
                title: 'Generating PDF\u2026',
                html: 'Please wait while the report is being prepared.',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: function () {
                    Swal.showLoading();

                    fetch('{{ route('admin.report.pdf') }}', { credentials: 'same-origin' })
                        .then(function (response) {
                            if (!response.ok) throw new Error('Server error ' + response.status);
                            return response.blob();
                        })
                        .then(function (blob) {
                            var url = window.URL.createObjectURL(blob);
                            var a   = document.createElement('a');
                            a.href     = url;
                            a.download = 'surogon-2026-report.pdf';
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                            document.body.removeChild(a);

                            Swal.fire({
                                icon: 'success',
                                title: 'Download Complete!',
                                text: 'Your PDF report has been downloaded.',
                                timer: 2200,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            });
                        })
                        .catch(function (err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'Could not generate the PDF report. Please try again.',
                            });
                            console.error(err);
                        });
                }
            });
        });
    </script>
@endpush

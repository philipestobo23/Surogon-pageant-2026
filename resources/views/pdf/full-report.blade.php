<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kababajinhan Surogon 2026 – Official Pageant Report</title>
    <style>
        /* ── Reset & Base ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 8.5px;
            color: #1a1a1a;
            background: #ffffff;
            line-height: 1.45;
        }

        /* ── Page Margins ── */
        @page {
            margin: 8mm 7mm 38mm 7mm;
            size: A4 landscape;
        }

        body {
            padding: 0;
        }

        /* Content wrapper for additional breathing room */
        .content-wrap {
            padding: 20px;
        }

        /* ─────────────────────────────────────────
       HEADER — fixed, repeats every page
    ───────────────────────────────────────── */
        .doc-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #ffffff;
            border-bottom: 2px solid #1a1a1a;
            padding-bottom: 8px;
            padding-top: 4px;
            margin-top: 12px;
        }

        .doc-header table {
            width: auto;
            min-width: 420px;
            max-width: 620px;
            border-collapse: collapse;
            border: none;
            margin: 0 auto;
        }

        .doc-header td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .header-logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
        }

        .header-logo-cell {
            width: 80px;
            text-align: center;
        }

        .header-text-cell {
            text-align: center;
            padding: 0 12px;
        }

        .header-org {
            font-size: 7.5px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 3px;
        }

        .header-title {
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #0d0d0d;
            line-height: 1.2;
        }

        .header-subtitle {
            font-size: 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #666;
            margin-top: 3px;
        }

        .header-doc-info {
            font-size: 7px;
            color: #888;
            margin-top: 5px;
        }

        .header-right-logo-cell {
            width: 80px;
            text-align: center;
        }

        .header-rule {
            border: none;
            border-top: 1px solid #aaa;
            margin: 6px 0 0;
        }

        /* ─────────────────────────────────────────
       SECTION HEADINGS
    ───────────────────────────────────────── */
        .section-title {
            font-size: 8.5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #0d0d0d;
            border-left: 3px solid #0d0d0d;
            padding: 5px 8px;
            background: #f2f2f2;
            margin-top: 8px;
            margin-bottom: 0;
        }

        .section-meta {
            font-size: 7px;
            color: #666;
            padding: 3px 8px 5px;
            background: #fafafa;
            border-left: 3px solid #ccc;
            margin-bottom: 2px;
        }

        /* ─────────────────────────────────────────
       TABLES
    ───────────────────────────────────────── */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
            font-size: 7.8px;
        }

        table.data-table thead {
            display: table-header-group;
        }

        table.data-table thead tr {
            background: #0d0d0d;
            color: #ffffff;
        }

        table.data-table th {
            padding: 5px 7px;
            text-align: center;
            font-weight: bold;
            font-size: 7px;
            letter-spacing: .4px;
            text-transform: uppercase;
            border: 1px solid #333;
        }

        table.data-table th.col-left {
            text-align: left;
        }

        table.data-table td {
            padding: 4px 7px;
            text-align: center;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        table.data-table td.col-name {
            text-align: left;
            font-weight: 600;
        }

        table.data-table tbody tr:nth-child(even) {
            background: #f8f8f8;
        }

        table.data-table tbody tr:nth-child(odd) {
            background: #ffffff;
        }

        table.data-table tbody tr:hover {
            background: #f0f0f0;
        }

        /* Final top-3 row accents — minimal */
        .row-1st td {
            font-weight: 700;
            border-bottom: 1.5px solid #555 !important;
        }

        .row-2nd td {
            border-bottom: 1px solid #aaa !important;
        }

        .row-3rd td {
            border-bottom: 1px solid #bbb !important;
        }

        /* Rank badge — clean pill */
        .rank-badge {
            display: inline-block;
            padding: 1px 9px;
            border-radius: 20px;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .rank-1st {
            background: #1a1a1a;
            color: #fff;
        }

        .rank-2nd {
            background: #555;
            color: #fff;
        }

        .rank-3rd {
            background: #888;
            color: #fff;
        }

        /* Winner box */
        .winner-box {
            margin-top: 10px;
            padding: 8px 14px;
            border: 1.5px solid #1a1a1a;
            text-align: center;
        }

        .winner-label {
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #1a1a1a;
        }

        .winner-name {
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #0d0d0d;
            margin-top: 3px;
        }

        .winner-detail {
            font-size: 7px;
            color: #666;
            margin-top: 2px;
        }

        /* Page break */
        .page-break {
            page-break-after: always;
        }

        /* Divider line between sub-sections */
        .sub-divider {
            border: none;
            border-top: 1px solid #ddd;
            margin: 10px 0 0;
        }

        /* Space reserved for the fixed header on every page */
        .h-spacer {
            height: 34mm;
            display: block;
        }

        /* Empty state */
        .empty-note {
            padding: 8px 10px;
            color: #999;
            font-style: italic;
            font-size: 8px;
            border-left: 3px solid #ddd;
            background: #fafafa;
        }

        /* ─────────────────────────────────────────
       FOOTER — fixed, repeats every page
    ───────────────────────────────────────── */
        .doc-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding-top: 7px;
            border-top: 2px solid #1a1a1a;
            background: #ffffff;
        }

        .footer-heading {
            font-size: 7.5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #333;
            text-align: center;
            margin-bottom: 12px;
        }

        .judges-row {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        .judges-row td {
            width: 20%;
            border: none;
            padding: 0 12px;
            vertical-align: bottom;
            text-align: center;
        }

        .judge-line {
            border-bottom: 1px solid #333;
            height: 22px;
            display: block;
            margin-bottom: 4px;
        }

        .judge-name {
            font-size: 7.5px;
            font-weight: bold;
            color: #1a1a1a;
            display: block;
            margin-bottom: 1px;
            letter-spacing: .3px;
        }

        .judge-label {
            font-size: 6.5px;
            color: #666;
            font-weight: normal;
            text-transform: uppercase;
            letter-spacing: .6px;
            display: block;
        }

        .judge-sub {
            font-size: 6.5px;
            color: #888;
            display: block;
            margin-top: 1px;
        }

        .footer-note {
            text-align: center;
            font-size: 6.5px;
            color: #aaa;
            margin-top: 12px;
        }
    </style>
</head>

<body>

    @php
        /* ── Update judge names here ── */
        $judges = [
            1 => 'Lorenzo Isip',
            2 => 'Kris Tiffany Janson',
            3 => 'Kirk Virtudazo Popiolek',
            4 => 'Steffi Rose Aberasturi Arcenas',
            5 => 'Kenneth Cabungcal',
        ];
    @endphp

    {{-- ═══ DOCUMENT HEADER (fixed — repeats every page) ═══ --}}
    <div class="doc-header">
        <table>
            <tr>
                <td class="header-logo-cell">
                    <img src="{{ public_path('images/SDN_LOGO.png') }}" class="header-logo" alt="Logo">
                </td>
                <td class="header-text-cell">
                    <div class="header-org">Republic of the Philippines &mdash; Surigao del Norte</div>
                    <div class="header-title">Kababajinhan Surogon 2026</div>
                    <div class="header-subtitle">Official Pageant Scoring &amp; Rankings Report</div>
                    <div class="header-doc-info">Date Generated: {{ now('Asia/Manila')->format('F j, Y') }}
                        &nbsp;&bull;&nbsp; {{ now('Asia/Manila')->format('g:i A') }} (PHT) &nbsp;&bull;&nbsp;
                        Prepared by: {{ auth()->user()->name ?? 'Administrator' }}</div>
                </td>
                <td class="header-right-logo-cell">
                    <img src="{{ public_path('images/rainbow.png') }}" class="header-logo" alt="Surogon 2026">
                </td>
            </tr>
        </table>
    </div>

    <div class="content-wrap">

        {{-- ═══════════════════════════════
        SECTION 1 — PRE-JUDGE
        ═══════════════════════════════ --}}
        <div class="h-spacer"></div>
        <div class="section-title">&sect; 1 &mdash; Pre-Judge / Preliminary Rankings</div>
        @if($preliminary->count())
            <div class="section-meta">{{ $preliminary->count() }} contestant(s) &nbsp;&bull;&nbsp; Categories: Closed
                Interview &middot; Photogenic &middot; White Collection &middot; Tourism Video &middot; Talent &middot;
                Filipiniana &middot; Production Wear &middot; Production Number &middot; Runway</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:30px">Rank</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Total</th>
                        <th>Interview</th>
                        <th>Photogenic</th>
                        <th>White Coll.</th>
                        <th>Tourism Vid.</th>
                        <th>Talent</th>
                        <th>Filipiniana</th>
                        <th>Prod. Wear</th>
                        <th>Prod. No.</th>
                        <th>Runway</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($preliminary as $p)
                        <tr>
                            <td>{{ $p->rank ?? '—' }}</td>
                            <td>{{ $p->contestant_number }}</td>
                            <td class="col-name">{{ $p->contestant_name }}</td>
                            <td><strong>{{ $p->total_ranking }}</strong></td>
                            <td>{{ $p->closed_interview }}</td>
                            <td>{{ $p->photogenic }}</td>
                            <td>{{ $p->white_collection }}</td>
                            <td>{{ $p->tourism_video }}</td>
                            <td>{{ $p->talent }}</td>
                            <td>{{ $p->filipiniana }}</td>
                            <td>{{ $p->production_wear }}</td>
                            <td>{{ $p->production_number }}</td>
                            <td>{{ $p->runway }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-note">No pre-judge scores have been recorded.</div>
        @endif


        <div class="page-break"></div>


        {{-- ═══════════════════════════════
        SECTION 2A — SWIMWEAR
        ═══════════════════════════════ --}}
        <div class="h-spacer"></div>
        <div class="section-title">&sect; 2A &mdash; Round 1: Swimwear Rankings</div>
        @if($coronation->count())
            <div class="section-meta">{{ $coronation->count() }} contestant(s)</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:30px">Rank</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Overall</th>
                        <th>Judge 1</th>
                        <th>Judge 2</th>
                        <th>Judge 3</th>
                        <th>Judge 4</th>
                        <th>Judge 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coronation->sortBy('rank_swimsuit') as $c)
                        <tr>
                            <td>{{ $c->rank_swimsuit ?? '—' }}</td>
                            <td>{{ $c->contestant_number }}</td>
                            <td class="col-name">{{ $c->contestant_name }}</td>
                            <td><strong>{{ $c->overall_ranking_swimsuit }}</strong></td>
                            <td>{{ $c->Judge1_swimsuit_ranking }}</td>
                            <td>{{ $c->Judge2_swimsuit_ranking }}</td>
                            <td>{{ $c->Judge3_swimsuit_ranking }}</td>
                            <td>{{ $c->Judge4_swimsuit_ranking }}</td>
                            <td>{{ $c->Judge5_swimsuit_ranking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Section 2B — Gown --}}
            <div class="page-break"></div>
            <div class="h-spacer"></div>
            <div class="section-title">&sect; 2B &mdash; Round 1: Long Gown Rankings</div>
            <div class="section-meta">{{ $coronation->count() }} contestant(s)</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:30px">Rank</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Overall</th>
                        <th>Judge 1</th>
                        <th>Judge 2</th>
                        <th>Judge 3</th>
                        <th>Judge 4</th>
                        <th>Judge 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coronation->sortBy('rank_gown') as $c)
                        <tr>
                            <td>{{ $c->rank_gown ?? '—' }}</td>
                            <td>{{ $c->contestant_number }}</td>
                            <td class="col-name">{{ $c->contestant_name }}</td>
                            <td><strong>{{ $c->overall_ranking_gown }}</strong></td>
                            <td>{{ $c->Judge1_gown_ranking }}</td>
                            <td>{{ $c->Judge2_gown_ranking }}</td>
                            <td>{{ $c->Judge3_gown_ranking }}</td>
                            <td>{{ $c->Judge4_gown_ranking }}</td>
                            <td>{{ $c->Judge5_gown_ranking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Section 2C — Overall Top 8 --}}
            <div class="page-break"></div>
            <div class="h-spacer"></div>
            <div class="section-title">&sect; 2C &mdash; Overall Top 8 Combined Rankings</div>
            <div class="section-meta">Combined score: Swimwear + Long Gown + Pre-Judge</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:30px">Overall</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Total Rank</th>
                        <th>Swimwear</th>
                        <th>Long Gown</th>
                        <th>Pre-Judge</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coronation->sortBy('overall_ranking') as $c)
                        <tr>
                            <td><strong>{{ $c->overall_ranking ?? '—' }}</strong></td>
                            <td>{{ $c->contestant_number }}</td>
                            <td class="col-name">{{ $c->contestant_name }}</td>
                            <td>{{ $c->total_ranking }}</td>
                            <td>{{ $c->rank_swimsuit }}</td>
                            <td>{{ $c->rank_gown }}</td>
                            <td>{{ $c->preliminary_ranking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-note">No Round 1 scores have been recorded.</div>
        @endif


        <div class="page-break"></div>


        {{-- ═══════════════════════════════
        SECTION 3 — SNAP TALK / ROUND 2
        ═══════════════════════════════ --}}
        <div class="h-spacer"></div>
        <div class="section-title">&sect; 3 &mdash; Round 2: Snap Talk Rankings (Top {{ $top10->count() }})</div>
        @if($top10->count())
            <div class="section-meta">{{ $top10->count() }} contestant(s) advanced to Round 2</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:30px">Rank</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Overall</th>
                        <th>Judge 1</th>
                        <th>Judge 2</th>
                        <th>Judge 3</th>
                        <th>Judge 4</th>
                        <th>Judge 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($top10->sortBy('rank_question') as $t)
                        <tr>
                            <td>{{ $t->rank_question ?? '—' }}</td>
                            <td>{{ $t->contestant_number }}</td>
                            <td class="col-name">{{ $t->contestant_name }}</td>
                            <td><strong>{{ $t->overall_ranking_question }}</strong></td>
                            <td>{{ $t->Judge1_question_ranking }}</td>
                            <td>{{ $t->Judge2_question_ranking }}</td>
                            <td>{{ $t->Judge3_question_ranking }}</td>
                            <td>{{ $t->Judge4_question_ranking }}</td>
                            <td>{{ $t->Judge5_question_ranking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-note">No Snap Talk (Round 2) scores have been recorded.</div>
        @endif


        <div class="page-break"></div>


        {{-- ═══════════════════════════════
        SECTION 4 — GRAND FINAL
        ═══════════════════════════════ --}}
        <div class="h-spacer"></div>
        <div class="section-title">&sect; 4 &mdash; Grand Final Event &mdash; Top 3</div>
        @if($finals->count())
            <div class="section-meta">{{ $finals->count() }} finalist(s) &nbsp;&bull;&nbsp; Grand Final Q&amp;A /
                Performance scoring</div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:42px">Rank</th>
                        <th style="width:28px">No.</th>
                        <th class="col-left">Contestant Name</th>
                        <th>Total Rank</th>
                        <th>Judge 1</th>
                        <th>Judge 2</th>
                        <th>Judge 3</th>
                        <th>Judge 4</th>
                        <th>Judge 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finals->sortBy('rank_final') as $f)
                        @php
                            $r = (int) $f->rank_final;
                            $rowCls = $r === 1 ? 'row-1st' : ($r === 2 ? 'row-2nd' : 'row-3rd');
                            $bdgCls = $r === 1 ? 'rank-1st' : ($r === 2 ? 'rank-2nd' : 'rank-3rd');
                            $lbl = $r === 1 ? '1st Place' : ($r === 2 ? '2nd Place' : '3rd Place');
                        @endphp
                        <tr class="{{ $rowCls }}">
                            <td><span class="rank-badge {{ $bdgCls }}">{{ $lbl }}</span></td>
                            <td>{{ $f->contestant_number }}</td>
                            <td class="col-name">{{ $f->contestant_name }}</td>
                            <td><strong>{{ $f->overall_ranking_final }}</strong></td>
                            <td>{{ $f->Judge1_final_ranking }}</td>
                            <td>{{ $f->Judge2_final_ranking }}</td>
                            <td>{{ $f->Judge3_final_ranking }}</td>
                            <td>{{ $f->Judge4_final_ranking }}</td>
                            <td>{{ $f->Judge5_final_ranking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @php $winner = $finals->sortBy('rank_final')->first(); @endphp
            @if($winner)
                <div class="winner-box">
                    <div class="winner-label">&#9670;&nbsp; Kababajinhan Surogon 2026 &nbsp;&#9670;</div>
                    <div class="winner-name">{{ $winner->contestant_name }}</div>
                    <div class="winner-detail">Contestant No. {{ $winner->contestant_number }} &nbsp;&bull;&nbsp; Final Score:
                        {{ $winner->overall_ranking_final }}</div>
                </div>
            @endif

        @else
            <div class="empty-note">No Grand Final scores have been recorded.</div>
        @endif


    </div>{{-- /content-wrap --}}

    {{-- ═══════════════════════════════
    JUDGES SIGNATORY FOOTER (fixed — appears on every page)
    ═══════════════════════════════ --}}
    <div class="doc-footer">
        <div class="footer-heading">Certified Correct &mdash; Board of Judges</div>
        <table class="judges-row">
            <tr>
                @for($i = 1; $i <= 5; $i++)
                    <td>
                        <span class="judge-line"></span>
                        <span class="judge-name">{{ $judges[$i] }}</span>
                        <span class="judge-label">Judge {{ $i }}</span>
                        <span class="judge-sub">Signature over Printed Name</span>
                    </td>
                @endfor
            </tr>
        </table>
        <div class="footer-note">
            Kababajinhan Surogon 2026 &mdash; Official Pageant Report &mdash; This document is computer-generated and
            valid without signature except on the judges&rsquo; signatory section above.
        </div>
    </div>
</body>

</html>
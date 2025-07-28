<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        body {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding: 1mm;
            font-family: 'Segoe UI', sans-serif;
        }

        .section-header {
            font-size: 30px;
            font-weight: bold;
        }
  

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin: 20px 0 10px 0;
        }

        .gallery img {
            border-radius: 6px;
            height: auto;
            object-fit: cover;
        }

        .gallery.single img {
            width: 100%;
        }

        .gallery.multi img {
            width: calc(50% - 5px);
        }

        .highlight-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 10px;
        }

        .highlight-block,
        .datetime-block {
            flex: 1;
            height: 140px;
            border-radius: 12px;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .highlight-block .highlight-top {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }

        .highlight-block i {
            font-size: 70px;
        }

        .highlight-value {
            font-size: 35px;
            font-weight: bold;
            color: #6a1b9a;
        }

        .highlight-label {
            font-size: 15px;
            color: #222;
            text-transform: uppercase;
            font-weight: 600;
            text-align: center;
        }

        .datetime-block {
            background-color: #003893;
            color: white;
            padding: 0;
        }

        .datetime-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45%;
            width: 100%;
            position: relative;
            border-bottom: 2px solid #fff;
        }

        .datetime-icons i {
            font-size: 30px;
            margin: 0 20px;
        }

        .datetime-icons::before {
            content: '';
            position: absolute;
            width: 2px;
            height: 50%;
            background-color: white;
            left: 50%;
            top: 25%;
            transform: translateX(-50%);
        }

        .datetime-text {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            line-height: 1.4;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

<!-- Top Section -->
<div class="text-center mb-3">
    <img src="/img/tce.jpg" alt="College Logo" style="height: 100px;">
    <h2 class="section-header mt-3">
        {{ strtoupper($event->club->club_name) }} ACTIVITY REPORT {{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}
    </h2>
<h4 class="fw-bold text-uppercase text-center mb-3" style="color: #2e7d32; font-size: 1.8rem; letter-spacing: 1px;">
    {{ strtoupper($event->event_name) }}
</h4>

</div>

@php
    $imgCount = count($eventImages ?? []);
@endphp

<div class="gallery {{ $imgCount === 1 ? 'single' : 'multi' }}">
    @foreach ($eventImages as $img)
        <img src="{{ asset('storage/' . $img) }}" alt="Event Image" style="max-width: 100%;">
    @endforeach
</div>


<h5 class="fw-bold mt-3 mb-2" style="font-size: 25px; letter-spacing: 0.5px; color: #4a148c; text-align: left;">
    KEY HIGHLIGHTS:
</h5>


<!-- Highlights and Datetime -->
<div class="highlight-row">
    @php
        $highlights = [
            ['icon' => 'bi-people-fill', 'value' => $event->participants, 'label' => 'Participants', 'color' => 'text-primary'],
            ['icon' => 'bi-person-check-fill', 'value' => $event->coordinators, 'label' => 'Coordinators/Mentors', 'color' => 'text-danger'],
            ['icon' => 'bi-award-fill', 'value' => $event->best_performance == 0 ? 'N/A' : $event->best_performance, 'label' => 'Top Performances', 'color' => 'text-warning']
        ];
    @endphp

    @foreach ($highlights as $item)
        <div class="highlight-block">
            <div class="highlight-top">
                <i class="bi {{ $item['icon'] }} {{ $item['color'] }}"></i>
                <div class="highlight-value">{{ $item['value'] }}</div>
            </div>
            <div class="highlight-label">{{ $item['label'] }}</div>
        </div>
    @endforeach

    <!-- DateTime Block -->
    <div class="datetime-block">
        <div class="datetime-icons">
            <i class="bi bi-calendar-week-fill"></i>
            <i class="bi bi-clock-fill"></i>
        </div>
        <div class="datetime-text">
            {{ \Carbon\Carbon::parse($event->start_date)->format('d') }}–{{ \Carbon\Carbon::parse($event->end_date)->format('d M, Y') }}<br>
            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}–{{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
        </div>
    </div>
</div>

<script>
    window.onload = function () {
        window.print();
    };
</script>

</body>
</html>

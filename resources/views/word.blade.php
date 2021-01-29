<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INDIVIDUALUS PRAKTIKOS ATLIKIMO GRAFIKAS</title>
</head>
<body>
    <p style="margin-top:0pt; margin-bottom:5pt; text-align:center; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">INDIVIDUALIOS PRAKTIKOS ATLIKIMO GRAFIKAS</span></strong></p>
<p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$trainee->name}} {{$trainee->last_name}} praktika atliekama nuo {{$trainee->contract_start}} iki {{$trainee->contract_end}}, i&scaron; viso {{$totalhours->first()}} val.</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<table cellpadding="0" cellspacing="0" style="width:520.7pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="width:71.55pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Studijų savaite</span></p>
            </th>
            <th style="width:76.7pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Savaitės diena</span></p>
            </th>
            <th style="width:164.15pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Paskaitų laikas</span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">(nuo kelintos iki kelintos valandos vyksta)</span></p>
            </th>
            <th style="width:164.35pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Praktikos atlikimo laikas</span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">(nuo kelintos iki kelintos valandos vyksta)</span></p>
            </th>
        </tr>
    </thead>
        <tbody>
            @foreach($weeks as $week)
        <tr>
            <td rowspan="5" style="width:71.55pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <h2 style="margin-top:10pt; margin-bottom:6pt; page-break-after:avoid; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$week->weeks}}</span></h2>
            </td>
            @foreach($ontimes as $ontime)
            @break($ontime->week != $week->weeks)
                if()
            @endphp
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$time->weekday}}</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">11:00 &ndash; 12:30</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">-</span></p>
            </td>
        </tr>
        @endforeach
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Antradienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:30 &ndash; 17:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">08:00 &ndash; 12:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Trečiadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:30 &ndash; 17:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">08:00 &ndash; 12:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Ketvirtadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">09:00 &ndash; 12:30</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:** &ndash; 17:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Penktadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">09:** &ndash; 12:30 &ndash; 13:30 &ndash; 15:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">15:30 &ndash; 17:00</span></p>
            </td>
        </tr>
        <tr style="height:11.5pt;">
            <td colspan="4" style="width:509.15pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
        </tr>
        <tr style="height:4.45pt;">
            <td colspan="3" style="width:334pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Praktikai atlikti skiriama valandų suma:</span></strong></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">20</span></strong></p>
            </td>
        </tr>
        <tr>
            <td rowspan="5" style="width:71.55pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <h2 style="margin-top:10pt; margin-bottom:6pt; page-break-after:avoid; font-size:11pt;"><span style="font-family:'Times New Roman';">2020 11 02 &ndash; 2020 11 06</span></h2>
            </td>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Pirmadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">11:00 &ndash; 12:30</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">08:00 &ndash; 10:30 &ndash; 13:** &ndash; 17:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Antradienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:30 &ndash; 17:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">08:00 &ndash; 12:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Trečiadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:30 &ndash; 17:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">08:00 &ndash; 12:00</span></p>
            </td>
        </tr>
        <tr style="height:15.6pt;">
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Ketvirtadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">09:00 &ndash; 10:30 &ndash; 13:30 &ndash; 15:00</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">11:00 &ndash; 12:00 &ndash; 15:30 &ndash; 17:00</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:76.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Penktadienis</span></p>
            </td>
            <td style="width:164.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">09:00 &ndash; 12:30</span></p>
            </td>
            <td style="width:164.35pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">13:00 &ndash; 17:00</span></p>
            </td>
        </tr>
        <tr style="height:11.5pt;">
            <td colspan="4" style="width:509.15pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<table cellpadding="0" cellspacing="0" style="width:522.4pt; border:0.75pt solid #fafafa; border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="width:119.75pt; border-right:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">Praktikos vadovas įmonėje</span></p>
            </td>
            <td style="border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:191.8pt; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Arial;">IoT akademijos vadovas</span></p>
            </td>
            <td style="border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:61.75pt; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:92.5pt; border-left:0.75pt solid #fafafa; border-bottom:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">***** Janėnas</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:119.75pt; border-top:0.75pt solid #fafafa; border-right:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="border-top:0.75pt solid #fafafa; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:191.8pt; border-top-style:solid; border-top-width:0.75pt; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Arial;">(Pareigos įmonėje)</span></p>
            </td>
            <td style="border-top:0.75pt solid #fafafa; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:61.75pt; border-top-style:solid; border-top-width:0.75pt; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:Arial;">(Para&scaron;as)</span></p>
            </td>
            <td style="border-top:0.75pt solid #fafafa; border-right:0.75pt solid #fafafa; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
            </td>
            <td style="width:92.5pt; border-top-style:solid; border-top-width:0.75pt; border-left:0.75pt solid #fafafa; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:Arial;">(Vardas ir pavardė)</span></p>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>

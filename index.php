<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Flight Schedules</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
        $phTZ = new DateTimeZone("Asia/Manila");
        $now  = new DateTime("now", $phTZ);
        ?>

        <header class="container">
            <h1>Flight Schedules</h1>
            <div class="time">
                Date: <?= $now->format("l, jS F Y"); ?><br>
                Time: <?= $now->format("H:i"); ?> (Asia/Manila)
            </div>
        </header>

        <main class="container">
            <h2>Domestic Flights</h2>

        <?php
        $domesticFlights = [
            ["PR 201", "Philippine Airlines", "Clark", "El Nido",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://upload.wikimedia.org/wikipedia/commons/c/c7/El_Nido_Bay_December_2018.jpg",
                "14:10", "PT1H35M"
            ],
            ["5J 302", "Cebu Pacific", "Clark", "Cebu",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://storage.googleapis.com/cebuinsights-assets/2022/07/fd7e749d-sirao.webp",
                "09:30", "PT1H30M"
            ],
            ["PR 145", "Philippine Airlines", "Manila", "Siargao",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSk_1yiZpPDuhtUGRHBjQn9ZGu-gacueMFukg&s",
                "11:00", "PT2H10M"
            ],
            ["5J 420", "Cebu Pacific", "Puerto Princesa", "Clark",
                "https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/PuertoPrincesa_Airport.JPG/250px-PuertoPrincesa_Airport.JPG",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "18:00", "PT1H35M"
            ],
            ["PR 188", "Philippine Airlines", "Clark", "Boracay",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcJ-lBA3KW1lhWkSqmkhubHOrdKVTznhPQUQ&s",
                "15:30", "PT1H15M"
            ]
        ];

        foreach ($domesticFlights as $flight) {

            $departure = new DateTime("today {$flight[6]}", $phTZ);
            $arrival   = clone $departure;
            $arrival->add(new DateInterval($flight[7]));

            $duration = $departure->diff($arrival);
            $status   = ($departure > $now) ? "On Time" : "Departed";
        ?>
            <div class="grid">
                <div class="card">
                    <h4>FROM</h4>
                    <img src="<?= $flight[4]; ?>" alt="Origin">
                    <p><?= $flight[2]; ?></p>
                    <small>
                        <?= $flight[0]; ?> — <?= $flight[1]; ?><br>
                        Departs: <?= $departure->format("H:i"); ?><br>
                        TZ: Asia/Manila
                    </small>
                </div>

                <div class="plane">✈️</div>

                <div class="card">
                    <h4>TO</h4>
                    <img src="<?= $flight[5]; ?>" alt="Destination">
                    <p><?= $flight[3]; ?></p>
                    <small>
                        Arrives: <?= $arrival->format("H:i"); ?><br>
                        Duration: <?= $duration->h ?>h <?= $duration->i ?>m<br>
                        Status: <?= $status; ?>
                    </small>
                </div>
            </div>
        <?php } ?>

            <h2>🌍 International Flights</h2>

        <?php
        $internationalFlights = [
            ["PR 412", "Philippine Airlines", "Manila", "Tokyo, Japan", "Asia/Tokyo",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8T65Uo1laywFZIqKM3sspog91cu5LF-fT8g&s",
                "06:00", "PT4H15M"
            ],
            ["5J 802", "Cebu Pacific", "Manila", "Singapore", "Asia/Singapore",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png",
                "https://images.goway.com/production/featured_images/shutterstock_1116483092.jpg",
                "09:00", "PT3H50M"
            ],
            ["BR 272", "AirSWIFT", "Clark", "Taipei, Taiwan", "Asia/Taipei",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png",
                "14:00", "PT2H05M"
            ],
            ["EK 337", "Emirates", "Clark", "Dubai, UAE", "Asia/Dubai",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://mediaim.expedia.com/destination/9/cd8a3f3db7149b0ce36d052aea1182df.jpg",
                "20:00", "PT9H20M"
            ],
            ["AC 018", "Air Canada", "Manila", "Toronto, Canada", "America/Toronto",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png",
                "https://2024-rd-staging.nyc3.cdn.digitaloceanspaces.com/2024-prepare-for-canada/2022/01/18152007/Living-in-Toronto-Image-2.png",
                "23:45", "PT15H"
            ]
        ];

        foreach ($internationalFlights as $flight) {

            $departure = new DateTime("today {$flight[7]}", $phTZ);
            $arrival   = clone $departure;
            $arrival->add(new DateInterval($flight[8]));
            $arrival->setTimezone(new DateTimeZone($flight[4]));

            $duration = $departure->diff($arrival);
        ?>
            <div class="grid">
                <div class="card">
                    <h4>FROM</h4>
                    <img src="<?= $flight[5]; ?>" alt="Origin">
                    <p><?= $flight[2]; ?></p>
                    <small>
                        <?= $flight[0]; ?> — <?= $flight[1]; ?><br>
                        Departs: <?= $departure->format("H:i"); ?><br>
                        TZ: Asia/Manila
                    </small>
                </div>

                <div class="plane">✈️</div>

                <div class="card">
                    <h4>TO</h4>
                    <img src="<?= $flight[6]; ?>" alt="Destination">
                    <p><?= $flight[3]; ?></p>
                    <small>
                        Arrives: <?= $arrival->format("H:i"); ?><br>
                        Duration: <?= $duration->h ?>h <?= $duration->i ?>m<br>
                        TZ: <?= $flight[4]; ?>
                    </small>
                </div>
            </div>
        <?php } ?>

            <hr>
            <h2>🌎 Current Time in Other Time Zones</h2>

            <div class="other-timezones">
                <?php
                $timeZones = [
                    "London, UK" => "Europe/London",
                    "New York, USA" => "America/New_York",
                    "Sydney, Australia" => "Australia/Sydney"
                ];

                foreach ($timeZones as $city => $tz) {
                    $dt = new DateTime("now", new DateTimeZone($tz));
                ?>
                    <div class="timezone-card">
                        <h4><?= $city; ?></h4>
                        <span><?= $dt->format("l, jS F Y"); ?></span>
                        <strong><?= $dt->format("H:i"); ?></strong>
                    </div>
                <?php } ?>
            </div>
        </main>
        <footer class="footer">
            <p>Capulong, Jeanne Macy E. || WD - 201</p>
            <small>© <?= date("Y"); ?> All Rights Reserved</small>
        </footer>
    </body>
</html>
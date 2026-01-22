<!DOCTYPE html>
<html>
    <head>
        <title>Flight Schedules</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <h1>Flight Schedules</h1>
            <?php
                $phTZ = new DateTimeZone("Asia/Manila");
                $now = new DateTime("now", $phTZ);
            ?>

            <div class="time">
                <?php
                    echo "Date: " . $now->format("l, jS F Y") . "<br>";
                    echo "Time: " . $now->format("H:i");
                ?>
            </div>

            <h2>Domestic Flights</h2>
            <?php
                $domesticFlights = [
                [
                "Clark", "El Nido",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://upload.wikimedia.org/wikipedia/commons/c/c7/El_Nido_Bay_December_2018.jpg",
                "14:10", "PT1H35M"
                ],
                [
                "Clark", "Cebu",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://storage.googleapis.com/cebuinsights-assets/2022/07/fd7e749d-sirao.webp",
                "09:30", "PT1H30M"
                ],
                [
                "Manila", "Siargao",
                "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png?itok=jnkLDndU",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSk_1yiZpPDuhtUGRHBjQn9ZGu-gacueMFukg&s",
                "11:00", "PT2H10M"
                ],
                [
                "Puerto Prinsesa", "Clark",
                "https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/PuertoPrincesa_Airport.JPG/250px-PuertoPrincesa_Airport.JPG",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "18:00", "PT1H35M"
                ],
                [
                "Clark", "Boracay",
                "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcJ-lBA3KW1lhWkSqmkhubHOrdKVTznhPQUQ&s",
                "15:30", "PT1H15M"
                ]
                ];

                foreach ($domesticFlights as $flight) {

                $departure = new DateTime("today {$flight[4]}", $phTZ);
                $arrival = clone $departure;
                $arrival->add(new DateInterval($flight[5]));
                ?>
                <div class="grid">
                    <div class="card">
                        <h4>FROM</h4>
                        <img src="<?= $flight[2]; ?>" alt="From">
                        <p><?= $flight[0]; ?></p>
                        <small>Departure: <?= $departure->format("H:i"); ?></small>
                    </div>

                <div class="plane">✈️</div>
                    <div class="card">
                        <h4>DESTINATION</h4>
                        <img src="<?= $flight[3]; ?>" alt="To">
                        <p><?= $flight[1]; ?></p>
                        <small>Arrival: <?= $arrival->format("H:i"); ?></small>
                    </div>
                </div>


            <?php } ?>
            
            <h2>🌍 International Flights</h2>
            <?php
                $internationalFlights = [
                    [
                        "Manila", "Tokyo, Japan", "Asia/Tokyo",
                        "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png?itok=jnkLDndU",
                        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8T65Uo1laywFZIqKM3sspog91cu5LF-fT8g&s",
                        "06:00", "PT4H15M"
                    ],
                    [
                        "Manila", "Singapore", "Asia/Singapore",
                        "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png?itok=jnkLDndU",
                        "https://images.goway.com/production/featured_images/shutterstock_1116483092.jpg",
                        "09:00", "PT3H50M"
                    ],
                    [
                        "Clark", "Taipei, Taiwan", "Asia/Taipei",
                        "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                        "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png?itok=jnkLDndU",
                        "14:00", "PT2H05M"
                    ],
                    [
                        "Clark", "Dubai, UAE", "Asia/Dubai",
                        "https://katewashere.com/wp-content/uploads/2025/06/clarkairport1.jpg",
                        "https://mediaim.expedia.com/destination/9/cd8a3f3db7149b0ce36d052aea1182df.jpg",
                        "20:00", "PT9H20M"
                    ],
                    [
                        "Manila", "Toronto, Canada", "America/Toronto",
                        "https://asbaa.org/sites/default/files/styles/content_full_width/public/2021-01/unnamed-2_0.png?itok=jnkLDndU",
                        "https://2024-rd-staging.nyc3.cdn.digitaloceanspaces.com/2024-prepare-for-canada/2022/01/18152007/Living-in-Toronto-Image-2.png",
                        "23:45", "PT15H"
                    ]
                ];

                foreach ($internationalFlights as $flight) {

                $departure = new DateTime("today {$flight[5]}", $phTZ);
                $arrival = clone $departure;
                $arrival->add(new DateInterval($flight[6]));
                $arrival->setTimezone(new DateTimeZone($flight[2]));
            ?>

            <div class="grid">
                <div class="card">
                    <h4>FROM</h4>
                    <img src="<?= $flight[3]; ?>" alt="From">
                    <p><?= $flight[0]; ?></p>
                    <small>Departure: <?= $departure->format("H:i"); ?></small>
                </div>

                <div class="plane">✈️</div>

                <div class="card">
                    <h4>DESTINATION</h4>
                    <img src="<?= $flight[4]; ?>" alt="To">
                    <p><?= $flight[1]; ?></p>
                    <small>Arrival: <?= $arrival->format("H:i"); ?></small>
                </div>
            </div>

            <?php } ?>

            <hr>
            <h2> 🌎 Current Time in Other Time Zones</h2>

            <?php
                $timeZones = [
                    "London, UK"      => "Europe/London",
                    "New York, USA"   => "America/New_York",
                    "Sydney, Australia" => "Australia/Sydney"
                ];

                echo '<div class="grid">';

                foreach ($timeZones as $city => $tz) {
                    $dt = new DateTime("now", new DateTimeZone($tz));
                    ?>
                    <div class="card">
                        <h4><?= $city; ?></h4>
                        <p><?= $dt->format("l, jS F Y"); ?></p>
                        <strong><?= $dt->format("H:i"); ?></strong>
                    </div>
                    <?php
                }

                echo '</div>';
            ?>
        </div>
        <footer class="footer">
            <p>Capulong, Jeanne Macy E. || WD - 201</p>
            <small>© <?php echo date("Y"); ?> All Rights Reserved</small>
        </footer>
    </body>
</html>
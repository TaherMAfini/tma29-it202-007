<?php if (isset($data)) : ?>
    
    <?php
        $team1 = htmlspecialchars_decode(se($data, "team1", "", false));
        $score1 = se($data, "score1", 0, false);
        $team2 = htmlspecialchars_decode(se($data, "team2", "", false));
        $score2 = se($data, "score2", 0, false);
    ?>

    <div class="container-fluid match-card mb-3 bg-info">
        <div class="container-fluid team">
            <h2><?php se($team1) ?></h2>
            <h3><?php se($score1)?></h3>
        </div>
        <div class="container-fluid team">
            <h2><?php se($team2) ?></h2>
            <h3><?php se($score2)?></h3>
        </div>
    </div>

<?php endif; ?>
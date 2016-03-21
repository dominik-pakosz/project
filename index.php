<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stats</title>
    </head>
    <body>
        <?php
        
        error_reporting(-1);
        ini_set('display_errors', 1);
        
        require_once 'CsvAdapter.php';
        require_once 'EpisodeInterface.php';
        require_once 'Episode.php';
        require_once 'SeriesInterface.php';
        require_once 'Series.php';
        
        $series = new Series(new CsvAdapter('ratings.csv'));
        
        $p = $series->getByTitleFirstLetter('p');
        
        ?>
        <table border="1">
            <tbody>
                <tr>
                    <th>Best in s05</th>
                    <td><?= $series->getBestInSeason(5) ?></td>
                </tr>
                <tr>
                    <th>Best season finale</th>
                    <td><?= $series->getBestSeasonFinale() ?></td>
                </tr>
                <tr>
                    <th>Starting with P</th>
                    <td>
                        <?php if ( ! empty($p)): ?>
                        <ul>
                            <?php foreach ($p as $title): ?>
                                
                            <li><?= $title ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        Nothing found
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
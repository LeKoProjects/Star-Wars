<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Catálogo de Filmes Star Wars</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Catálogo de Filmes Star Wars</h1>
        <div class="row mt-4">
            <?php foreach ($films as $film): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?= htmlspecialchars($film['title']); ?></h5>
                            <p class="card-text text-white">Data de Lançamento: <?= htmlspecialchars($film['release_date']); ?></p>
                            <a href="/detalhes?id=<?= htmlspecialchars($film['episode_id']); ?>" class="btn btn-primary btn-detalhes" data-id="<?= htmlspecialchars($film['episode_id']); ?>">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Detalhes do Filme</title>
</head>
<body>
<div class="container my-5">
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card p-4">
                <h1 class="text-center"><?= htmlspecialchars($film['title']); ?></h1>
                <p><strong>Nº Episódio:</strong> <?= htmlspecialchars($film['episode_id']); ?></p>
                <p><strong>Sinopse:</strong> <?= htmlspecialchars($film['opening_crawl']); ?></p>
                <p><strong>Data de Lançamento:</strong> <?= htmlspecialchars($film['release_date']); ?></p>
                <p><strong>Idade do Filme:</strong> <?= htmlspecialchars($filmAge); ?></p>
                <p><strong>Diretor:</strong> <?= htmlspecialchars($film['director']); ?></p>
                <p><strong>Produtor(es):</strong> <?= htmlspecialchars($film['producer']); ?></p>
                <h2>Personagens</h2>
                <ul>
                    <?php foreach ($characters as $character): ?>
                        <li><?= htmlspecialchars($character['name'] ?? 'Personagem desconhecido'); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="/" class="btn btn-primary mt-3">Voltar ao Catálogo</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
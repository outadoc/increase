<div class="col-md-2">
    <a href="#" class="thumbnail">
        {{ image("img/" ~ project.getNom() ~ ".png") }}
    </a>
</div>
<div class="col-md-10">
    <div class="page-header">
        <h1>{{ project.getNom() }}
            <small>({{ project.getUser().getIdentite() }})</small>
        </h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Détails du projet</h1>
        </div>
        <div class="panel-body">
            <p>{{ project.getDescription() }}</p>

            <p>Date de lancement : {{ project.getDateLancementStr() }}</p>

            <p>Date de fin prévue : {{ project.getDateFinPrevueStr() }}</p>
        </div>
    </div>
</div>
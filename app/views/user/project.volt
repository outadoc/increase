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
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group" id="team-panel">
        </ul>
    </div>
    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">{x} Messages...</a>
    </div>
    <div id="divMessages">

    </div>
</div>
<script type="text/javascript">

    var panelEquipe = $("#team-panel");

    $.ajax('{{ url("project/equipe/" ~ project.getId()) }}')
            .done(function (equipe) {

                for (var i = 0; i < equipe.length; i++) {
                    panelEquipe.append('<li class="list-group-item"><strong>' + equipe[i].name + '</strong>' +
                    ' (' + Math.round(equipe[i].weight * 100) + '%)</li>');
                }

            });


</script>
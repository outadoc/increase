{# On inclut les détails du projets #}
{{ partial("/partials/project-details") }}

<div class="col-md-10 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group" id="team-panel">
        </ul>
    </div>
</div>

{# On inclut les messages #}
{{ partial("/partials/messages") }}

<script type="text/javascript">

    var panelEquipe = $("#team-panel"),
            btnClose = $("#btnClose");

    $.ajax('{{ url("project/equipe/" ~ project.getId()) }}')
            .done(function (equipe) {

                for (var i = 0; i < equipe.length; i++) {
                    panelEquipe.append('<li class="list-group-item"><strong>' + equipe[i].name + '</strong>' +
                    ' (' + Math.round(equipe[i].weight * 100) + '%)</li>');
                }

            });

    btnClose.click(function () {
        window.location = "{{ url('user/projects/' ~ project.getIdclient()) }}";
    });

</script>
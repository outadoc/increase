{# On inclut les détails du projets #}
{{ partial("/partials/project-details") }}

<div class="col-md-10 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Mes cas d'utilisation</h1>
        </div>
        <ul class="list-group" id="usecases-panel">
        </ul>
    </div>
</div>

{# On inclut les messages #}
{{ partial("/partials/messages") }}

<script type="text/javascript">

    var panelUsecases = $("#usecases-panel"),
            btnClose = $("#btnClose");

    $.ajax('{{ url("project/author/" ~ project.getId() ~ "/" ~ author.getId()) }}')
            .done(function (usecases) {

                for (var i = 0; i < usecases.length; i++) {
                    panelUsecases.append('' +
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-md-2">' +
                    '<span class="usecase-code">' + usecases[i].code + '</span> ' +
                    '<span class="usecase-weight">(' + usecases[i].weight + ')</span>' +
                    '</div>' +
                    '<div class="col-md-8">' + getProgressBar(usecases[i].progress) + '</div>' +
                    '<div class="col-md-2">' +
                    '<span class="nb-taches">' +
                    usecases[i].nb_tasks + ' ' + ((usecases[i].nb_tasks == 1) ? 'tâche' : 'tâches') + '' +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
                }

            });

    btnClose.click(function () {
        window.location = "{{ url('author/projects/' ~ author.getId()) }}";
    });

    function getProgressBar(progress) {
        return '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="' + progress +
                '" aria-valuemin="0" aria-valuemax="100" style="width: ' + progress + '%;">' + progress + '%</div></div>';
    }

</script>
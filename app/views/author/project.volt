{# On inclut les détails du projets #}
{{ partial("/partials/project-details") }}

<div class="col-md-10 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Mes cas d'utilisation</h1>
        </div>
        <div class="list-group" id="usecases-panel">
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modification tâche
                    <small></small>
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modal-libelle">Libellé :</label>
                        <input class="form-control" type="text" id="modal-libelle">
                    </div>
                    <div class="form-group">
                        <label for="modal-poids">Poids (en %)</label>
                        <input class="form-control" type="number" min="0" max="100" step="5" id="modal-poids">
                    </div>
                    <div class="form-group">
                        <label for="modal-date">Date</label>
                        <input class="form-control" type="date" id="modal-date">
                    </div>

                    <input type="hidden" value="" id="modal-id">
                    <input type="hidden" value="" id="modal-usecase-id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="modal-submit">Valider</button>
            </div>
        </div>
    </div>
</div>

<div class="col-md-10 col-md-offset-2">
    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">{{ messages | length }} messages...</a>
        <a id="btnClose" class="btn btn-default">Fermer le projet</a>
    </div>

    {# On inclut les messages #}
    {{ partial("/partials/messages") }}
</div>

{{script_foot}}

<script type="text/javascript">

    var panelUsecases = $("#usecases-panel"),
            btnClose = $("#btnClose"),
            btnModalSubmit = $("#modal-submit");

    function onLoadedUsecases(usecases) {
        for (var i = 0; i < usecases.length; i++) {
            panelUsecases.append('' +
            '<a href="#" class="list-group-item usecase" data-code="' + usecases[i].code + '">' +
            '<div class="row">' +
            '<div class="col-md-3">' +
            '<span class="usecase-code"><strong>' + usecases[i].code + '</strong></span> ' +
            '<span class="usecase-weight">(' + usecases[i].weight + ')</span>' +
            '</div>' +
            '<div class="col-md-5 col-md-offset-1">' + getProgressBar(usecases[i].progress) + '</div>' +
            '<div class="col-md-2 col-md-offset-1">' +
            '<span class="nb-taches">' +
            usecases[i].nb_tasks + ' ' + ((usecases[i].nb_tasks == 1) ? 'tâche' : 'tâches') + '' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</a>' +
            '<div class="list-group-item list-group liste-taches" id="divUseCase-' + usecases[i].code + '" style="display: none">' +
            '</div>');
        }

        $(".usecase").click(function (e) {
            var code = $(this).attr("data-code");

            e.preventDefault();
            $.ajax('{{ url("usecase/taches/") }}' + code)
                    .done(function (usecases) {
                        onLoadedTasks(code, usecases);
                    });
        });
    }

    function onLoadedTasks(code, tasks) {
        // Une fois que les tâches d'un usecase sont chargées
        var divUseCase = $("#divUseCase-" + code);

        // On vire les tâches qui pourraient être déjà existantes
        divUseCase.empty();

        // On créé une ligne pour chaque tâche
        for (var i = 0; i < tasks.length; i++) {
            divUseCase.append('' +
            '<a href="#" class="list-group-item tache" data-index="' + i + '">' +
            '<div class="row">' +
            '<div class="col-md-5"><strong>' + tasks[i].label + '</strong> (' + tasks[i].progress + '%)</div>' +
            '<div class="col-md-2 col-md-offset-5">' + tasks[i].date + '</div>' +
            '</div>' +
            '</a>');
        }

        // On ajoute les boutons à la fin de la liste
        divUseCase.append('' +
        '<div style="margin-top: 20px">' +
        '<button class="btn btn-primary" id="btn-add-usecase-' + code + '">Ajouter une tâche</button>' +
        '<span class="btns" style="display: none">' +
        '<button class="btn btn-default" id="btn-edit-usecase-' + code + '">Modifier...</button>' +
        '<button class="btn btn-default">Supprimer</button>' +
        '</span>' +
        '</div>');

        // Au click sur une tâche, on affiche les boutons et on sélectionne une ligne
        $(".tache").click(function (e) {
            e.preventDefault();

            var list = $(this).parent(".liste-taches");

            $(list).find(".tache").removeClass("active");
            $(list).find(".btns").show();
            $(this).addClass("active");
        });

        // Au click sur le bouton modifier, on ouvre la fenêtre modale
        $('#btn-edit-usecase-' + code).click(function () {
            // On récupère la tâche à modifier
            var index = divUseCase.find(".tache.active").data('index');
            var tache = tasks[index];

            // On met à jour les champs de la modale
            $("#modal-libelle").val(tache.label);
            $("#modal-poids").val(tache.progress);
            $("#modal-date").val(tache.date);
            $("#modal-id").val(tache.id);
            $("#modal-usecase-id").val(code);

            $('#modal-add-task').modal();
        });

        $('#btn-add-usecase-' + code).click(function () {
            // On met à jour les champs de la modale
            $("#modal-libelle").val("");
            $("#modal-poids").val("");
            $("#modal-date").val("");
            $("#modal-id").val("");
            $("#modal-usecase-id").val("");

            $('#modal-add-task').modal();
        });

        divUseCase.toggle(300);
    }

    function getProgressBar(progress) {
        return '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="' + progress +
                '" aria-valuemin="0" aria-valuemax="100" style="width: ' + progress + '%;">' + progress + '%</div></div>';
    }

    $.ajax('{{ url("project/author/" ~ project.getId() ~ "/" ~ author.getId()) }}')
            .done(onLoadedUsecases);

    btnModalSubmit.click(function () {
        var id = $("#modal-id").val(),
                url = "";

        if (id != "") {
            url = "{{ url('tache/update/') }}" + id;
        } else {
            url = "{{ url('tache/insert/') }}";
        }

        $.ajax({
            type: "POST",
            url: url,
            data: {
                libelle: $("modal-libelle").val(),
                date: $("modal-date").val(),
                avancement: $("#modal-poids").val(),
                codeUseCase: $("#modal-usecase-id").val()
            }
        }).done(function () {
            $("modal-add-task").modal('hide');
        });
    });

</script>
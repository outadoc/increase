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

{{ script_foot }}

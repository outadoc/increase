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

<div class="col-md-10 col-md-offset-2">
    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">{{ messages | length }} messages...</a>
        <a id="btnClose" class="btn btn-default">Fermer le projet</a>
    </div>

    {# On inclut les messages #}
    {{ partial("/partials/messages") }}
</div>

{{script_foot}}

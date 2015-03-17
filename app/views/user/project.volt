<div class="col-md-2">
    <a href="#" class="thumbnail">
        {{ image("img/" ~ project.getNom() ~ ".png") }}
    </a>
</div>
<div class="col-md-10">
    <div class="page-header">
        <h1>{{ project.getNom() }}
            <small>[{{ project.getUser().getIdentite() }}]</small>
        </h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Détails du projet</h1>
        </div>
        <div class="panel-body">
            <p>{{ project.getDescription() }}</p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Équipe</h1>
        </div>
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
        </ul>
    </div>
    <div class="btns">
        <a id="btnMessages" class="btn btn-primary">{x} Messages...</a>
    </div>
    <div id="divMessages">

    </div>
</div>
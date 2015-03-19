<h1>Mes projects [{{ Author.getIdentite() }}]</h1>

{% for project in projects %}
    <p>{{ project.getNom() }}</p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="{{ project.progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ progress }}%;">
            {{ project.progress }}
        </div>
    </div>
    <p>{{ project.getDatefinprevue()-date('now') }}</p>
{% endfor %}
<h1>Mes projects [user.identite]</h1>

{% foreach (project in projects) %}
    {% for nom in project.nom %}
        <p>{{ project.nom }}</p>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{ project.progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ progress }}%;">
                {{ project.progress }}
            </div>
        </div>
        <p>{{ project.tempRest }}</p>
        
    {% endfor %}
{% endfor %}


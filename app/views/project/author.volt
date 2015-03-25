{% for usecase in usecases %}
    <a href="#" class="list-group-item usecase" data-code="{{ usecase['code'] }}" id="useCase-{{ usecase['code'] }}">
        <div class="row">
            <div class="col-md-3">
                <span class="usecase-code">
                    <strong>{{ usecase['code'] }}</strong>
                </span>
                <span class="usecase-weight">({{ usecase['weight'] }})</span>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ usecase['progress'] }}"
                         aria-valuemin="0" aria-valuemax="100" style="width: {{ usecase['progress'] }}%;">
                        {{ usecase['progress'] }}%
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <span class="nb-taches">
                {{ usecase['nb_tasks'] }} {% if usecase['nb_tasks'] == 1 %} tâche {% else %} tâches {% endif %}
                </span>
            </div>
        </div>
    </a>
    <div class="list-group-item list-group liste-taches" id="divUseCase-{{ usecase['code'] }}" style="display: block">
    </div>
{% endfor %}

{{ script_foot }}
{% for task in tasks %}
    <a href="#" class="list-group-item tache" data-index="{{ loop.index0 }}">
        <div class="row">
            <div class="col-md-5"><strong>{{ task['label'] }}</strong> ({{ task['progress'] }}%)</div>
            <div class="col-md-2 col-md-offset-5">{{ task['date'] }}</div>
        </div>
    </a>
{% endfor %}
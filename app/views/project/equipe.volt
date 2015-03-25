{% for dev in devs %}
    <li class="list-group-item">
        <strong>{{ dev["name"] }}</strong>
        {{ dev["weight"] }}%
    </li>
{% endfor %}
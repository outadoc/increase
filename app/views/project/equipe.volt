<ul>
    {% for dev in devs %}
        <li>{{ dev['name'] }} = {{ dev['weight'] * 100 }}</li>
    {% endfor %}
</ul>
{# Macro qui permet d'afficher un message et ses enfants de façon récursive #}
{# message: le message à afficher #}
{# parentId: l'identifiant du message parent (-1 si message de niveau 0) #}
{%- macro display_message(message, parentId) %}
    {# Si le message actuel est bien de niveau 0 ou en réponse au parent #}
    {% if message.getIdFil() == null or message.getIdFil() == parentId %}
        <div class="msg panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="msg-object">{{ message.getObjet() }}</span>
                    <span class="msg-author"> par {{ message.getEmetteur().getIdentite() }}</span>
                    <span class="msg-date">{{ message.getFormattedDate() }}</span>
                </h3>
            </div>
            <div class="msg-content panel-body">
                {{ message.getContent() }}
                {% for child in message.getChildren() %}
                    {{ display_message(child, message.getId()) }}
                {% endfor %}
            </div>
        </div>
    {% endif %}
{%- endmacro %}

<div id="divMessages" style="display: none">
    {% for message in messages %}
        {{ display_message(message, -1) }}
    {% endfor %}
</div>

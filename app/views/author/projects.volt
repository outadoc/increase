<h1>Mes projects [{{ Author.getIdentite() }}]</h1>
<br>
<table width="100%">
    {% for project in projects %}
        <tr>
            <td width="20%">
                {{ project.getNom() }}
            </td>
            <td width="50%">
                <div class="progress">
                    <div class="progress-bar progress-bar-{{ couleur }}" role="progressbar" aria-valuenow="{{ project.getAvancement() }}" aria-valuemin="0" aria-valuemax="100"
                         style="width: {{ project.getAvancement() }}%;">
                        {{ project.getAvancement() }}%
                    </div>
                </div>
            </td>
            <td width="10%" style="text-align: center">
                <p>{{ project.getJourRest()}}</p>
            </td>
            <td width="10%">
                <button id="btnOuvrir-{{ project.getId() }}" class="btn btn-default">Ouvrir</button>
            </td>
        </tr>
    {% endfor %}
</table>

{{ script_foot }}
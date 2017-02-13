<div class="jumbotron">
    <div class="container">
        <h1>{{ model.display_name }}</h1>
        <p>This is the <strong>Model</strong> template that displays a models' images and details.</p>
        <p>{{ model.profile }}</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
        
            <div class="panel panel-default">
                <div class="panel-heading">Measurements</div>
                <table class="table table-striped">
                <tbody>
                {% for measurement in model.measurements %}
            		<tr>
                        <td><label>{{ measurement.name }}</label></td>
                        <td>{% if measurement.imperial %}{{ measurement.imperial | floats_to_fractions }}{% else %}{{ measurement.value }}{% endif %}</span></td>
                    </tr>
                {% endfor %}
                {% if model.hair_color %}
        	        <tr>
        		        <td><label>Hair</label></td>
                        <td>{{ model.hair_color }}</td>
                    </tr>
                {% endif %}
                {% if model.eye_color %}
        	        <tr>
                        <td><label>Eyes</label></td>
                        <td>{{ model.eye_color }}</td>
                    </tr>
                {% endif %}
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="col-sm-9">
            <div class="row">
            
                <div class="panel panel-default">
                    <div class="panel-heading">{{ gallery.name }}</div>
                    <div class="panel-body">
                    
                        <p>You can use any style or layout to display galleries and images. Click on an image to enlarge.</p>
                        
                        <p>Galleries can also be exported to PDF in <a href="/pdf/{{ gallery.id }}?size=small" target="_blank">small</a>, 
                        <a href="/pdf/{{ gallery.id }}?size=medium" target="_blank">medium</a>, 
                        and <a href="/pdf/{{ gallery.id }}?size=large" target="_blank">large</a> sizes.</p> 
                        
                        <p>&nbsp;</p>
                        
                        {% for image in gallery.files %}
                            {% if image.is_landscape %}
                            <div class="col-xs-8 col-sm-6 col-md-6">                
                            {% else %}
                            <div class="col-xs-4 col-sm-3 col-md-3">
                            {% endif %}
                                <a href="{{ image | gallery_img_url: 'large' }}" class="fancybox thumbnail" rel="gallery">
                                    {{ image | gallery_img_url: 'small' | img_tag: '' }}
                                </a>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
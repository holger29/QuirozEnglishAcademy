# usuarios/views.py

from django.http import HttpResponse
from .models import Usuarios  # Importamos el modelo que Django creó para nosotros

def lista_nombres_usuarios(request):
    """
    Esta función obtiene todos los usuarios y devuelve sus nombres completos.
    """
    # 1. Hacemos la consulta a la base de datos. ¡Así de fácil!
    todos_los_usuarios = Usuarios.objects.all()

    # 2. Creamos una lista de Python con los nombres y apellidos.
    nombres_completos = []
    for usuario in todos_los_usuarios:
        # Usamos un f-string para unir el nombre y el apellido
        nombres_completos.append(f"{usuario.nombre} {usuario.apellidos}")

    # 3. Unimos todos los nombres en un solo bloque de texto,
    #    separados por un salto de línea (<br>) para que se vea mejor en el navegador.
    respuesta_html = "<br>".join(nombres_completos)

    # 4. Devolvemos ese texto como una respuesta web.
    return HttpResponse(respuesta_html)
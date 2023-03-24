# fastapi
# uvicorn
# python-multipart
# jinja2

import os

import uvicorn
from fastapi import FastAPI, Form, Request
from fastapi.responses import JSONResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates

# Use to get the correct address even if the execution path is different
main_dir = os.path.dirname(__file__)

app = FastAPI()

# Import templates and static files
# Original structure
# templates = Jinja2Templates(directory=f"{main_dir}/templates")
# Migration of php site html part (we hard link to its src directory on same server)
templates = Jinja2Templates(directory=f"{main_dir}/src")
# Should mount others static materials like this ( /img, or /static/img ?! later... )
app.mount(
    "/static", StaticFiles(directory=f"{main_dir}/static"), name="static")
'''
# Original structure
#@app.get("/")
#async def test(request: Request):
#    return templates.TemplateResponse("test.html.ori", {"request": request, "data": "Test"})
# DR - Migration's
'''
my_list = ['/', '/src/', '/src/index.html']
# my_list = ["/"]
for text in my_list:
    @app.get(text)
    async def test(request: Request):
        return templates.TemplateResponse("index.html", {"request": request, "data": "Test"})
"""
@app.get("/src/css/styles.css")
async def styles( request: Request ):
    return templates.TemplateResponse("css/styles.css", {"request": request, "data": "Test"})

@app.get("css/styles.css")
async def styles( request: Request ):
    return templates.TemplateResponse("css/styles.css", {"request": request, "data": "Test"})

vvvv NOT SURE IT RETURN A TEMPLATE (ERROR UTF-8 text/html read...)"""
'''@app.get("/img_dan-3.webp")
async def img_dan( request: Request ):
    return templates.TemplateResponse("/static/img_dan-3.webp", {"request": request, "data": "Test"})
'''


@app.get("/src/page2.html")
async def page2(request: Request):
    return templates.TemplateResponse("page2.html", {"request": request, "data": "Test"})


@app.get("/src/page3-B-Cards.html")
async def page3(request: Request):
    return templates.TemplateResponse("page3-B-Cards.html", {"request": request, "data": "Test"})


@app.get("/src/php/page3.php")
async def page3_php(request: Request):
    return templates.TemplateResponse("php/page3.php", {"request": request, "data": "Test"})


@app.get("/src/php/msgFile.html")
async def msg_file(request: Request):
    return templates.TemplateResponse("php/msgFile.html", {"request": request, "data": "Test"})

'''
@app.get("/src/php/like.php")
async def like(request: Request):
    return templates.TemplateResponse("php/like.php", {"request": request, "data": "Test"})
'''


@app.post("/src/php/like.php")
async def like_post(request: Request):
    return templates.TemplateResponse("php/like.php", {"request": request, "data": "Test"})


@app.get("/src/php/note_form.php")
async def note_form(request: Request):
    return templates.TemplateResponse("php/note_form.php", {"request": request, "data": "Test"})


@app.post("/src/php/add_note.php")
async def add_note(request: Request):
    return templates.TemplateResponse("php/add_note.php", {"request": request, "data": "Test"})


@app.get("/src/php/class/TestClass.php")
async def test_poo(request: Request):
    return templates.TemplateResponse("class/TestClass.php", {"request": request, "data": "Test"})


# read as text/html => error
# @app.get("/src/js/script.js")
# async def test(request: Request):
#    return templates.TemplateResponse("js/script.js")

''' DR - Was part of initial project 
     ( much proper - I confess I tainted it ALL ) 
@app.post("/result")
async def test(idx: int = Form()):
    return {"idx": idx}
'''

# Run it in the following way to correct the package path
# [ NB, DR : port 8000 is already in use on my Fedora37 ] - Changed to 8100
if __name__ == "__main__":
    uvicorn.run("main:app", host="127.0.0.1", port=8100, reload=True)

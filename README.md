## Library (me)
(making requirements file)
```
pip freeze > requirements.txt
```

## Install the library (you)
(from empty venv)

```
pip install -r requirements.txt
```

## Execute

```
main.py
```

#  DR - DevOps 'S   #
<h4>
## For uvicorn launch to test/deploy<br>
# Issue : **error Error loading ASGI app. Could not import module "main".**<br>
# When launching uvicorn "out of the bound" (aka web server side)<br>
# => What Fails : <br>
#  uvicorn main:app --port 8100 --host '::' --proxy-headers --forwarded-allow-ips "::1"<br>
# THUS before we MUST do this (after completed pip modules installations) :<br>
</h4>

```
$ cd <source directory of clone>

$ uvicorn main:app --reload
```
# On Server 
(acting as a httpd damon - can be tested locally too)

```
uvicorn main:app --port 8100 --host '::' --proxy-headers --forwarded-allow-ips "::1"
```

from flask import Flask, render_template, json, request
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False

@app.route("/")
def main():
    user = {"name":"Sharon"}
    return render_template("index.html",user=user,title="Home Page")
@app.route("/templates/about.html")
def about():
    user = {"name":"Sharon"}
    return render_template("about.html",user=user,title="About Page")
@app.route("/templates/products.html")
def products():
    user = {"name":"Sharon"}
    return render_template("products.html",user=user,title="Products Page")
@app.route("/templates/store.html")
def store():
    user = {"name":"Sharon"}
    return render_template("store.html",user=user,title="Store Page")
@app.route("/templates/index.html")
def index():
    user = {"name":"Sharon"}
    return render_template("index.html",user=user,title="index Page")

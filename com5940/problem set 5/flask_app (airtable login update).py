from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
from flask_login import LoginManager, login_user, logout_user, login_required, UserMixin
import requests
app = Flask(__name__)
app.config["DEBUG"] = False
app.config['SECRET_KEY'] = "JutzX21JOBqOdxlCV8xqqnxD"
login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'
@login_manager.user_loader
def load_user(user_id):
    return User(user_id)
class User(UserMixin):
  def __init__(self,id):
    self.id = id


@app.route("/")
@login_required
def index1():
    r = requests.get('https://api.airtable.com/v0/appUnfcnf7SLuanVf/Imported%20table?api_key=keyJngv7iT0m6kzo2&sortField=_createdTime&sortDirection=desc')
    dict = r.json()
    dataset = []
    for i in dict['records']:
         dict = i['fields']
         dataset.append(dict)
    return render_template('index.html', entries=dataset)

@app.route("/templates/about.html")
@login_required
def chart():
    r = requests.get('https://api.airtable.com/v0/appqTr1WsjkmoPWSY/user_login%20copy?api_key=keyJngv7iT0m6kzo2&sortField=_createdTime&sortDirection=desc')
    dict1 = r.json()
    dict2 = {}
    dataset = []
    name_list = []
    cred_list = []

    for i in dict1['records']:
         dict2 = i['fields']
         dataset.append(dict2)
    for item in dataset:
        name_list.append(item.get('Name'))
        cred_list.append(item.get('cred-sum'))

    return render_template('about.html', entries = zip(name_list, cred_list))

@app.route("/templates/about.html")
@login_required
def table():
    headers = {
        'Authorization': 'Bearer keyJngv7iT0m6kzo2',
    }

    params = (
        ('maxRecords', '25'),
        ('view', 'Grid View'),
    )
    r = requests.get('https://api.airtable.com/v0/appqTr1WsjkmoPWSY/ref?api_key=keyJngv7iT0m6kzo2&sortField=_createdTime&sortDirection=desc', headers=headers, params=params)
    dict = r.json()
    dataset = []
    for i in dict['records']:
         dict = i['fields']

         dataset.append(dict)
    return render_template('about.html', data=dataset)


@app.route("/templates/products.html")
@login_required
def map():
    headers = {
        'Authorization': 'Bearer keyJngv7iT0m6kzo2',
    }
    params = (
        ('view', 'Grid view'),
    )
    r = requests.get('https://api.airtable.com/v0/appgIi4oLnDe3vGNm/%E5%9C%B0%E5%9B%BE?api_key=keyJngv7iT0m6kzo2&sortField=_createdTime&sortDirection=desc',headers=headers, params=params)
    dict = r.json()
    dataset = []
    for i in dict['records']:
         dict = i['fields']
         dataset.append(dict)
    return render_template('products.html', entries = dataset)

@app.route("/login")
def login():
    message = 'Please login in first.'
    return render_template('login.html', message=message)
@app.route("/process",methods=['POST'])
def process():
    username = request.form['username']
    password = request.form['password']
    r = requests.get('https://api.airtable.com/v0/appba5G7mQq2Pr8eR/Table%201?api_key=keyJngv7iT0m6kzo2&sortField=_createdTime&sortDirection=desc')
    dict = r.json()
    dataset = []
    user_list = []
    pwd_list = []
    for i in dict['records']:
        dict = i['fields']
        dataset.append(dict)
    for item in dataset:
       user_list = item.get('UserName')
       pwd_list = item.get('Pwd')
    if  username == user_list and password == pwd_list:
        login_user(User(1))
        message = "Dear " + username + ", welcome to Sharon's pages. Your login has been granted."
        return render_template('products.html', message=message)
    message = 'wrong password!'
    return render_template('login.html',message=message)
@app.route('/logout/')
@login_required
def logout():
    logout_user()
    message = 'Thanks for logging out.'
    return render_template('login.html',message=message)
if __name__ == '__main__':
   app.run(debug = True)
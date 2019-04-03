from flask import Flask, request, json, jsonify
app = Flask(__name__)

@app.route('/', methods=[ 'POST'])
def hello_world():
    json_data = request.get_json()
    text = json_data.get('text', None)
    if (text):
        return 'You send ' + str(text)
    else:
        return 'No text sended'

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000)

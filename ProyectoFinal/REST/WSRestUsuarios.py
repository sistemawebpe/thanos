from flask import Flask, jsonify, request
import mysql.connector
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import time
import smtplib
def enviarReporte(mensaje,direcciones):
    try:
        msg = MIMEMultipart()
        message = mensaje
        server = smtplib.SMTP('smtp.live.com: 587')
        msg['From'] = "provisionTDP@telefonica.com"
        password = "Temp1234"
        msg['To'] = direcciones
        msg['Subject'] = u"Thanos: Corre de acceso a sistema Fuel Finder - " + time.strftime("%Y/%m/%d")
        msg.attach(MIMEText(message, 'html'))
        server.starttls()
        server.login(msg['From'], password)
        server.sendmail(msg['From'], msg['To'].split(","), msg.as_string())
        server.quit()
        print("successfull sent email to %s:" %(msg['To']))
    except:
        print ("Error al enviar Correo" + msg['To'])

try:
	conn = mysql.connector.connect(host='127.0.0.1',user='root',passwd='mysql',db='thanos_usuarios')
	cur=conn.cursor()
	print ">> DB conectada..."
except mysql.connector.Error as err:
    print ">> Error al conectar la BD <<"
    print (err)
app = Flask(__name__)

@app.route('/login',methods=["POST"])
def login():
    #content = request.get_json(force=True)
    usuario = request.form.get("usuario")
    clave = str(request.form.get("clave"))
    #usuario=content["usuario"]
    #clave=content["clave"]

    sql="SELECT correo_cliente,nombCliente,apell_Cliente FROM upc_datacliente WHERE correo_cliente='" + usuario + "' AND pass_cliente=md5('"+ clave +"')"
    
    try:
        cur.execute(sql)
        datos=cur.fetchall()
        print len(datos)
        #if len(datos)>0:
        #print datos[0][0] + "--" + usuario
        if len(datos)>0:
            print "Usuario encontrado"
            #enviarReporte("Se detecto un ingreso al sistema Fuel Finder",usuario)
            return jsonify({"Mensaje":"OK"})
        else:
            print "Usuario No encontrado"
            return jsonify({"Mensaje":"NoOK"})
    except mysql.connector.Error as err:
        print "Error al momento de grabar" + str(err)
        return jsonify({"Mensaje":"Error " + sql})
    
if __name__=='__main__':
    app.run(debug=True, port=4001)
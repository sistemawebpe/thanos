from flask import Flask, jsonify, request
import mysql.connector

try:
	conn = mysql.connector.connect(host='127.0.0.1',user='root',passwd='mysql',db='jvillanueva')
	cur=conn.cursor()
	print ">> DB conectada..."
except mysql.connector.Error as err:
    print ">> Error al conectar la BD <<"
    print (err)
app = Flask(__name__)

@app.route('/grabar',methods=["POST"])
def grabar():
    #content = request.get_json(force=True)
    nomDistrio = request.form.get("NomDistrito")
    sql="INSERT INTO upc_distrito (NomDistrito) VALUES('%s')" % nomDistrio
    try:
        cur.execute(sql)
        conn.commit()
        print "Se ingreso el distrito %s correctamente" % nomDistrio
        return jsonify({"Mensaje":"OK"})
    except mysql.connector.Error as err:
        print "Error al momento de grabar" + str(err)
        return jsonify({"Mensaje":"Error " + str(err)})

@app.route('/distrito/<string:id>')
def distrito(id):
    sql="SELECT `codDistrito`,`NomDistrito`,`Estado` FROM `upc_distrito` WHERE codDistrito=" +id
    cur.execute(sql)
    datos=cur.fetchall()
    if len(datos)>0:
        return jsonify(datos)
    else:
        return jsonify({"Mensaje":"Distrito no encontrado"})
@app.route('/distrito/<string:id>',methods=["DELETE"])
def borrarDistrito(id):
    sql="SELECT `codDistrito`,`NomDistrito`,`Estado` FROM `upc_distrito` WHERE codDistrito=" +id
    cur.execute(sql)
    datos=cur.fetchall()
    if datos[0][2]=="A":
        return jsonify({"Mensaje":"Distrito no se puede borrar por estar activo"})
    else:
        sql="DELETE FROM `upc_distrito` WHERE codDistrito=" +id  
        try:
            cur.execute(sql)
            conn.commit()
            return jsonify({"Mensaje":"Se Elimino satisfactoriamente"})
        except:
            return jsonify({"Mensaje":"Error, no se pudo eliminar"})
#Servicio de estaciones
@app.route('/EstacioneGrabar',methods=["POST"])
def EstacionesGrabar():
    #content = request.get_json(force=True)
    codDistrito = request.form.get("codDistrito")
    NomEstacion=request.form.get("NomEstacion")
    Direccion=request.form.get("Direccion")
    Telefono=str(request.form.get("Telefono"))
    gas84plus=str(request.form.get("gas84plus"))
    gas90plus=str(request.form.get("gas90plus"))
    gas95plus=str(request.form.get("gas95plus"))
    gas97plus=str(request.form.get("gas97plus"))
    gas98plus=str(request.form.get("gas98plus"))
    dbs_s50_uv=str(request.form.get("dbs_s50_uv"))
    Estado="A"

    sql="INSERT INTO upc_estaciones(codDistrito,NomEstacion,Direccion,Telefono,gas84plus,gas90plus,gas95plus,gas97plus,gas98plus,dbs_s50_uv,Estado) VALUES ('" + codDistrito + "','" + NomEstacion + "','" + Direccion + "','" + Telefono + "','" + gas84plus  + "','" + gas90plus + "','" + gas95plus + "','" + gas97plus + "','" + gas98plus + "','" + dbs_s50_uv + "','" + Estado + "')"
    #sql="INSERT INTO upc_estaciones(codDistrito,NomEstacion,Direccion,Telefono,gas84plus,gas90plus,gas95plus,gas97plus,gas98plus,dbs_s50_uv,Estado) VALUES ('" + codDistrito + "','" + NomEstacion
    print sql
    
    try:
        cur.execute(sql)
        conn.commit()
        print "Se ingreso el distrito"
        return jsonify({"Mensaje":"OK"})
    except mysql.connector.Error as err:
        print "Error al momento de grabar" + str(err)
        return jsonify({"Mensaje":"Error " + str(err)})

@app.route('/ConsultaEstacion/<string:id>',methods=["GET"])
def ConsultaEstacion(id):
    #id = request.form.get("id")
    sql="SELECT * FROM `upc_estaciones` WHERE idEstacion="+str(id)
    try:
        cur.execute(sql)
        datos=cur.fetchall()
        print "Se ingreso el distrito"
        return jsonify({"Mensaje":"OK","datos":datos})
    except mysql.connector.Error as err:
        print "Error al momento de grabar" + str(err)
        return jsonify({"Mensaje":"Error " + str(err)})

@app.route('/UpdateEstaciones',methods=["POST"])
def UpdateEstaciones():
    #content = request.get_json(force=True)
    codDistrito = request.form.get("codDistrito")
    NomEstacion=request.form.get("NomEstacion")
    Direccion=request.form.get("Direccion")
    Telefono=str(request.form.get("Telefono"))
    gas84plus=str(request.form.get("gas84plus"))
    gas90plus=str(request.form.get("gas90plus"))
    gas95plus=str(request.form.get("gas95plus"))
    gas97plus=str(request.form.get("gas97plus"))
    gas98plus=str(request.form.get("gas98plus"))
    dbs_s50_uv=str(request.form.get("dbs_s50_uv"))
    Estado="A"

    sql="INSERT INTO upc_estaciones(codDistrito,NomEstacion,Direccion,Telefono,gas84plus,gas90plus,gas95plus,gas97plus,gas98plus,dbs_s50_uv,Estado) VALUES ('" + codDistrito + "','" + NomEstacion + "','" + Direccion + "','" + Telefono + "','" + gas84plus  + "','" + gas90plus + "','" + gas95plus + "','" + gas97plus + "','" + gas98plus + "','" + dbs_s50_uv + "','" + Estado + "')"
    #sql="INSERT INTO upc_estaciones(codDistrito,NomEstacion,Direccion,Telefono,gas84plus,gas90plus,gas95plus,gas97plus,gas98plus,dbs_s50_uv,Estado) VALUES ('" + codDistrito + "','" + NomEstacion
    print sql
    
    try:
        cur.execute(sql)
        conn.commit()
        print "Se ingreso el distrito"
        return jsonify({"Mensaje":"OK"})
    except mysql.connector.Error as err:
        print "Error al momento de grabar" + str(err)
        return jsonify({"Mensaje":"Error " + str(err)})

if __name__=='__main__':
    app.run(debug=True, port=4000)
import mysql.connector
import os
import random
from datetime import datetime
import time
fan = prev_fan = light = prev_light = air = prev_air = ''

while(True):
    prev_fan = fan
    prev_light = light
    prev_air = air

    mydb= mysql.connector.connect(user='thangktv',password='Spkt@5079',host='localhost',database='dashboard')
    mycursor = mydb.cursor()
    now = datetime.now()
    formatted_date = now.strftime('%Y-%m-%d %H:%M:%S')
    temp = random.randint(27,38)
    humid = random.randint(25,70)
    sql = "insert into monitor(temp, humid, time) values (%s, %s, %s)"
    val = (temp, humid, formatted_date)
    mycursor.execute(sql,val)
    mydb.commit()

    mycursor.execute("select * from control")
    myresult = mycursor.fetchone()

    fan = myresult[0]
    light = myresult[1]
    air = myresult[2]

    if (fan != prev_fan):
        if (fan == 'ON'):
            print("Fan is running")
        else:
            print("Fan is stopped")

    if (light != prev_light):
        if (light == 'ON'):
            print("Light has been turn on")
        else:
            print("Light has been turn off")

    if (air != prev_air):
        if (air == 'ON'):
            print("Air conditioner is running")
        else:
            print("Air conditioner is stopped")

    time.sleep(1)
    
import json
import csv
from datetime import datetime
import paho.mqtt.client as mqtt

BROKER = "localhost"   # <-- GANTI INI
TOPIC = "sensor/ppg"

CSV_FILE = "data_sensor.csv"

def on_message(client, userdata, msg):
    try:
        data = json.loads(msg.payload.decode())
    except json.JSONDecodeError:
        print("JSON error")
        return

    row = [
        datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        data.get("red_raw"),
        data.get("ir_raw"),
        data.get("red_filtered"),
        data.get("ir_filtered"),
        data.get("ts")
    ]

    with open(CSV_FILE, "a", newline="") as f:
        writer = csv.writer(f)
        writer.writerow(row)

client = mqtt.Client()
client.connect(BROKER, 1883)
client.subscribe(TOPIC)
client.on_message = on_message

print("Listening MQTT...")
client.loop_forever()

#include <SPI.h>
#include <SPI.h>
#include <Ethernet.h>
// mac adres
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
// website to get to
char server[] = "localhost/arduino/includes/importData.php";
// string to send via get
String baseStringScore = "GET /?score=";
String baseStringLocation = "GET /?location=";
String endString = " HTTP/1.1";
// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 137, 177);
EthernetClient client;

int loc = 0;
int score = 244;
void setup() 
{
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }

  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  // give the Ethernet shield a second to initialize:
  delay(1000);
  Serial.println("connecting...");
  sendScore();
  sendLocation();
}

void loop() 
{
  
  
}
// disconnect ethernet
void disconnectServer()
{
  if (!client.connected()) 
  {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
  }
}

// send the score to database
void sendScore()
{
  // add variable to the base string that we need to send
  String stringToSend = baseStringScore + score;
  stringToSend = stringToSend + endString;

  //send via get
  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.println(stringToSend);
    client.println("Host: localhost/arduino/includes/importData.php");
    client.println("Connection: close");
    client.println();
  } 
  else 
  {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  disconnectServer();
}

// send the location to database
void sendLocation()
{
  // add variable to the base string that we need to send
  String stringToSend = baseStringLocation + loc;
  stringToSend = stringToSend + endString;

  //send via get
  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.println(stringToSend);
    client.println("Host: localhost/arduino/includes/importData.php");
    client.println("Connection: close");
    client.println();
  } 
  else 
  {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  disconnectServer();
}


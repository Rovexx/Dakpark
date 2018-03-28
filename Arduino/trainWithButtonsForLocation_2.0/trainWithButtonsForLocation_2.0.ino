//  internet  ////////////////////////////////////////////////////
#include <SPI.h>
#include <Ethernet.h>
// mac adres
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
// website to get to
char server[] = "dakpark.jeroenvanderrhee.nl";
// string to send via get
String baseStringScore = "GET /?score=";
String baseStringLocation = "GET /?location=";
String endString = " HTTP/1.1";
// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 137, 177);
EthernetClient client;
//////////////////////////////////////////////////////////////////

#include <Servo.h>
//new servo object
Servo konijnServo1;
Servo konijnServo2;

//servo output pin
int servoPin1 = 8;
int servoPin2 = 9;

//pins for the locationbuttons
int train1 = 2;
int train2 = 3;
int train3 = 4;
int train4 = 5;

//default buttonstates of the trainbuttons
int train1Loc = 0;
int train2Loc = 0;
int train3Loc = 0;
int train4Loc = 0;

//train location
int loc = 0;

//score variable
int score = 0;

//boolean to start counting amount of time bunny is under the ground
bool startCount1 = false;
bool startCount2 = false;

//variables for the bunny
int shoot1 = 0;
int shoot2 = 0;
int counter1 = 0;
bool wasUp1 = false;
int counter2 = 0;
bool wasUp2 = false;

void setup() {
  Serial.begin(9600);
  konijnServo1.attach(servoPin1);
  konijnServo2.attach(servoPin2);
  
  //buttons to detect the train
  pinMode(train1, INPUT);
  digitalWrite(train1, HIGH);
  
  pinMode(train2, INPUT);
  digitalWrite(train2, HIGH);
  
  pinMode(train3, INPUT);
  digitalWrite(train3, HIGH);
  
  pinMode(train4, INPUT);
  digitalWrite(train4, HIGH);
  
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
}

void loop() {
  //read buttonstate of eacht train button, either 1 or 0
  train1Loc = !digitalRead(train1);
  train2Loc = !digitalRead(train2);
  train3Loc = !digitalRead(train3);
  train4Loc = !digitalRead(train4);
  
  //read buttonstate of eacht bunny, this simulates the shooting in real life
  shoot1 = digitalRead(8);//bunny1
  shoot2 = digitalRead(9);//bunny2
  
  //functions to detect location and move bunny's
  trainLocation();
  moveBunny1(3,0);
  moveBunny2(1,2);
  
  //Serial.print("Score: ");
  //Serial.println(score);
}

//chech the trainlocation, either 0, 1, 2 or 3
void trainLocation(){
  if(train1Loc == 1 && loc == 0){
    loc = 1;
    Serial.println(loc);
  }else if(train2Loc == 1 && loc == 1){
    loc = 2;
    Serial.println(loc);
  }else if(train3Loc == 1 && loc == 2){
    loc = 3;
    Serial.println(loc);
  } else if(train4Loc == 1 && loc == 3){
    loc = 0;
    Serial.println(loc);
    score = 0;
  }
  sendLocation();
}

//move the bunny depending on the location of the train. Move the bunny down if it was shot and
//move it up again after a certain amount of time. 
void moveBunny1(int loc1, int loc2){
  if(loc == loc1){
    //dont remove the serial.print!
    Serial.println(counter1);
    if(shoot1 == 1){
      shoot1 = 1;
      delay(500);
      konijnServo1.write(63);
      startCount1 = true;
      wasUp1 = true;
      shoot1 = 0;
    }
    else if(shoot1 == 0 && wasUp1 == false){
      konijnServo1.write(177);
    }
    
    if(counter1 >= 600){
      counter1 = 0;
      score = score+10;
      sendScore();
      startCount1 = false;
      wasUp1 = false;
    }
    if(startCount1 == true){
      counter1++;
    } 
  }
  else if(loc == loc2){
    konijnServo1.write(63);
    counter1 = 0;
    startCount1 = false;
    wasUp1 = false;
  }   
}

//same funtion as the one above but with a different servo. 
void moveBunny2(int loc1, int loc2){
  if(loc == loc1){
    Serial.println(counter2);
    if(shoot2 == 1){
      shoot2 = 1;
      delay(500);
      konijnServo2.write(70);
      startCount2 = true;
      wasUp2 = true;
      shoot2 = 0;
    }
    else if(shoot2 == 0 && wasUp2 == false){
      konijnServo2.write(170);
    }
    
    if(counter2 >= 600){
      counter2 = 0;
      score = score + 10;
      sendScore();
      startCount2 = false;
      wasUp2 = false;
    }
    if(startCount2 == true){
      counter2++;
    } 
  }
  else if(loc == loc2){
    konijnServo2.write(70);
    counter2 = 0;
    startCount2 = false;
    wasUp2 = false;
  }   
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
    client.println("Host: dakpark.jeroenvanderrhee.nl");
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
  String stringToSend = baseStringLocation + score;
  stringToSend = stringToSend + endString;

  //send via get
  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.println(stringToSend);
    client.println("Host: dakpark.jeroenvanderrhee.nl");
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

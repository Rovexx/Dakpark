/*

*/

#include <Servo.h>
//new servo object
Servo konijnServo1;
Servo konijnServo2;

//servo output pin
int servoPin1 = 2;
int servoPin2 = 3;

//pins for the rabbit shoot buttons
int shootPin1 = 7;
int shootPin2 = 6;

//pins for the locationbuttons
int train1 = 44;
int train2 = 50;
int train3 = 48;
int train4 = 46;

//default buttonstates of the trainbuttons
int train1Loc = 0;
int train2Loc = 0;
int train3Loc = 0;
int train4Loc = 0;

//train location
int loc = 0;

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
  Serial.println("setup");
  //buttons to detect the train
  pinMode(train1, INPUT_PULLUP);
  digitalWrite(train1, HIGH);
  
  pinMode(train2, INPUT_PULLUP);
  digitalWrite(train2, HIGH);
  
  pinMode(train3, INPUT_PULLUP);
  digitalWrite(train3, HIGH);
  
  pinMode(train4, INPUT_PULLUP);
  digitalWrite(train4, HIGH);
  
}

void loop() {
  //read buttonstate of eacht train button, either 1 or 0
  train1Loc = !digitalRead(train1);
  train2Loc = !digitalRead(train2);
  train3Loc = !digitalRead(train3);
  train4Loc = !digitalRead(train4);
  //read buttonstate of eacht bunny, this simulates the shooting in real life
  shoot1 = digitalRead(shootPin1);//bunny1
  shoot2 = digitalRead(shootPin2);//bunny2
  
  //functions to detect location and move bunny's
  trainLocation();
  moveBunny1(3,0);
  moveBunny2(1,2);
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
  }
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



/*

*/
#include <Servo.h>

//new servo object
Servo konijnServo;

//servo output pin
int servoPin = 11;

//input pins
int shootPin = 4;

//state of buttons 
int trainIsClose = 0;
int shoot = 0;

//servo values
int up = 120;
int down = 20;

//states of bunny
bool bunnyUp = false;
bool wasUp = false;

//counter for bunny if it is shot
int bunnyCounter = 0;
bool bunnyCount = false;


const int trigPin = 9;
const int echoPin = 10;

long duration; // Time from object to sensor
int distance = 0; // Distance based on duration
int distances[5]; // Includes 5 different distances
int distanceCount = 0; // For counting up distances
int detectedCount = 0; // For counting distances below 15 cm

void setup() {
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(servoPin, OUTPUT);
  pinMode(shootPin, INPUT);
  konijnServo.attach(servoPin);
  Serial.begin(9600); // Starts the serial communication
}

void loop() 
{
  treinDetecteren();
  shoot = digitalRead(shootPin);
  
  trainClose();
  showBunny();

}

void treinDetecteren() {
  if(distanceCount == 5){ // Measured 5 distances
    for(int x = 0; x < 5; x++){ // To loop through distances array
      if(distances[x] < 15){ // To check every distance to be below 15cm
          if(detectedCount == 5 ){ // All 5 distances in array are below 15cm
            trainIsClose = 1;
            detectedCount = 0; // Back to 0 to be able to detect a new coming train
          }
          detectedCount ++; // 1 more distance is below 15cm
      }else{
        detectedCount = 0; // 1 distance is not below 15cm; count starting over again
        trainIsClose = 0;
      }
    }
    distanceCount = 0; // 5 distances measured; back to 0 to count another 5
  }else{
    for(int i = 0; i < 5; i++) { // To measure 5 distances
      afstandmeting();
  
      distances[i] = distance;  // Add a new distance to the array
      distanceCount ++; // Counts measured distances
    }
  }
}


void afstandmeting()
{
  digitalWrite(trigPin, LOW); // Clears the trigPin
  digitalWrite(trigPin, HIGH);
  digitalWrite(trigPin, LOW);
      
  duration = pulseIn(echoPin, HIGH);  // Reads the echoPin, returns the sound wave travel time in microseconds
     
  distance = duration*0.034/2;  // Calculating the distance
  delay(200);    
  Serial.print("Distance: ");   // Prints the distance on the Serial Monitor
  Serial.println(distance);
}


void trainClose(){
  if(trainIsClose == 1 && wasUp == false){
    if(shoot == 1){
      bunnyMove(down);
      wasUp = true;
      bunnyCount = true;
    }else if(shoot == 0){
      bunnyMove(up);
      wasUp = false;
    }
  }else if(trainIsClose == 0 && wasUp == false){
    bunnyMove(down);
  }
}

void bunnyMove(int degree){
  konijnServo.write(degree);
}

void showBunny(){
  if(bunnyCount == true){
    bunnyCounter ++;
    Serial.println(bunnyCounter);
  }
  
  if(bunnyCounter == 200){
    bunnyCount = false;
    wasUp = false;
    bunnyCounter = 0;
  }
}



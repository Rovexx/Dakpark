const int trigPin = 9;
const int echoPin = 10;

long duration;
int distance = 0;;
int distances[5];
int distanceCount = 0;
int detectedCount = 0;

void setup() {
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  Serial.begin(9600); // Starts the serial communication
}

void loop() 
{
  // 5 of the same distances for insurance
  if(distanceCount == 5){
    for(int x = 0; x < 5; x++){
      Serial.println(detectedCount);
      if(distances[x] < 15){
          if(detectedCount == 5){
            Serial.println("Trein gedetecteerd");
            detectedCount = 0;
          }
          detectedCount ++;
      }else{
        detectedCount = 0;
      }
    }
    distanceCount = 0;
  }else{
    for(int i = 0; i < 5; i++) {
      afstandmeting();
      delay(1000);
  
      distances[i] = distance;
      distanceCount ++;
    }
  }
}

void afstandmeting()
{
  // Clears the trigPin
      digitalWrite(trigPin, LOW);
      
      // Sets the trigPin on HIGH state for 10 micro seconds
      digitalWrite(trigPin, HIGH);
      digitalWrite(trigPin, LOW);
      
      // Reads the echoPin, returns the sound wave travel time in microseconds
      duration = pulseIn(echoPin, HIGH);
      
      // Calculating the distance
      distance = duration*0.034/2;
      
      // Prints the distance on the Serial Monitor
      Serial.print("Distance: ");
      Serial.println(distance);
      Serial.print("Distancecount: ");
      Serial.println(distanceCount);
}


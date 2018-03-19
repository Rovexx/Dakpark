const int trigPin = 9;
const int echoPin = 10;

long duration;
int distance;
int distances[] = {};
int distanceCount;
int detectedCount;

void setup() {
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  Serial.begin(9600); // Starts the serial communication
}

void loop() {
  // 5 of the same distances for insurance
  if(distanceCount == 4){
    for(int x = 0; x < 5; x++){
      if(5 < distances[x] < 15){
          if(detectedCount == 4){
            Serial.println("Trein gedetecteerd");
            detectedCount = 0;
          }
          detectedCount = detectedCount + 1;
      }else{
        detectedCount = 0;
      }
    }
    distanceCount = 0;
  }else{
    for(int i = 0; i < 5; i++) {
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
      delay(1000);
  
      distances[i] = distance;
      distanceCount = distanceCount + 1;
    }
  }
}


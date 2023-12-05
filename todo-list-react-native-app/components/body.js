import { useState } from "react";
import { StyleSheet, Text, View, TextInput, TouchableOpacity, ScrollView, KeyboardAvoidingView, Platform, Keyboard } from 'react-native';
import Task from "./task";

function body() {
  const [task, setTask] = useState();
  const [taskItems, setTaskItems] = useState([]);

  const handleAddTask = () => {
    Keyboard.dismiss();
    setTaskItems([...taskItems, task])
    setTask(null);
  };

  const deleteTask = (index) => {
    let itemCopy = [...taskItems];
    itemCopy.splice(index, 1);
    setTaskItems(itemCopy);
  }

  return (
    <View style={styles.container}>
      <View style={styles.container}>
          <Text style={ styles.title }>Todo list</Text>
      </View>
      {/* today's tasks */}
      <View style={ styles.tasksWrapper }>
        <Text style={ styles.sectionTitle }>
          Today's task
        </Text>
        <View style={styles.items}>
          {/* this is where the tasks will come */}
          <ScrollView>
          {
            taskItems.map((item, index) => {
              return (
                <TouchableOpacity key={index} onPress={() => deleteTask(index)}>
                  <Task text={item} />
                </TouchableOpacity>
              )
            })
          }
          </ScrollView>
          {/* <Task text={'Task 1'} />
          <Task text={'Task 2'} /> */}
        </View>
      </View>

      {/* write a task */}
      <KeyboardAvoidingView behavior={Platform.OS === 'ios' ? 'padding' : 'height'} style={styles.writeTaskWrapper}>

        <TextInput style={styles.input} placeholder=" Write a task" placeholderTextColor={'lime'} value={task} onChangeText={text => setTask(text)}></TextInput>
          <TouchableOpacity onPress={() => handleAddTask()}>
          <View style={styles.addWrapper}>
              <Text style={ styles.addText }>+</Text>
          </View>
      </TouchableOpacity>
      </KeyboardAvoidingView>
      
    </View>
  );
}

export default body;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#000',
    alignItems: 'center',
    justifyContent: 'center',
  },

    title: {
      color: "lime",
      fontSize: 30,
      marginTop: 30,
  },
    
  tasksWrapper: {
    flex: 3,
    paddingHorizontal: 20,
  },
  
  sectionTitle: {
    color: "lime",
    fontSize: 24,
    fontWeight: "bold",
  },
  
  items: {
    marginTop: 30,
    height: 300,
  },
  
  writeTaskWrapper: {
    position: "absolute",
    bottom: 60,
    width: '100%',
    flexDirection: "row",
    justifyContent: "space-around",
    alignItems: "center",
  },

  input: {
    color: "lime",
    paddingVertical: 15,
    paddingHorizontal: 15,
    width: 250,
    borderColor: 'rgb(0,255,0)',
    borderWidth: 2,
    borderRadius: 60,
    },
    
  addWrapper: {
    width: 60,
    height: 60,
    backgroundColor: "rgb(0,255,0)",
    borderRadius: 60,
    justifyContent: "center",
    alignItems: "center",
    },

  addText: {
    color: "black",
    textAlign: "center",
  },
});

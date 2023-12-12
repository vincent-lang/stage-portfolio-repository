import { StyleSheet, Text, View } from 'react-native';

export default function App() {
  return (
    <View style={styles.container}>
      <Text style={ styles.text }>Hello world!!!!</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#000",
    alignItems: 'center',
    justifyContent: 'center',
  },

  text: {
    color: "rgba(0,255,0,1)",
    backgroundColor: "rgba(255,0,0,0.5)",
    padding: 10,
  },
});

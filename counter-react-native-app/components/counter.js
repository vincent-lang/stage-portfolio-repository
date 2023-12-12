import { useState } from "react";
import { StyleSheet, View, TouchableOpacity, Text } from "react-native";

function Counter() {
    let [count, setCount] = useState(0);

    return (
        <View style={styles.container}>
            <Text style={styles.textStyle}>Have fun counting</Text>
            <Text style={styles.textStyle}>{count}</Text>
            <View style={styles.row}>
            <View style={styles.shadow}>
            <TouchableOpacity style={styles.button} onPress={() => {setCount(count + 1)}}>
                <Text style={styles.buttonText}>
                    Increase Counter
                </Text>
            </TouchableOpacity>
            </View>
            <View style={styles.shadow}>
            <TouchableOpacity style={styles.button} onPress={() => {setCount(count - 1)}}>
                <Text style={styles.buttonText}>
                    Decrease Counter
                </Text>
            </TouchableOpacity>
            </View>
            <View style={styles.shadow}>
            <TouchableOpacity style={styles.button} onPress={() => {setCount(count = 0)}}>
                <Text style={styles.buttonText}>
                    Reset Counter
                </Text>
            </TouchableOpacity>
            </View>
            </View>
        </View>
    );
}

export default Counter;

const styles = StyleSheet.create({
    container: {
        height: '100%',
        display: 'flex',
        paddingTop: 200,
        backgroundColor: 'black',
    },

    textStyle: {
        fontSize: 18,
        textAlign: 'center',
        marginBottom: 30,
        color: 'lime',
    },

    button: {
        padding: 10,
        borderRadius: 5,
    },

    buttonText: {
        color: "lime",
        textAlign: "center",
    },

    shadow: {
        elevation: 6,
        shadowColor: "lime",
        borderRadius: 5,
        width: 100,
        padding: 5,
    },

    row: {
        justifyContent: "space-evenly",
        flexDirection: "row",
    }
});
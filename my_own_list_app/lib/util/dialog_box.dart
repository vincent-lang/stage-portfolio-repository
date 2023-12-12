// ignore_for_file: must_be_immutable

import 'package:flutter/material.dart';
import 'package:my_own_list_app/util/my_button.dart';

class DialogBox extends StatelessWidget {
  final dynamic controller;
VoidCallback onSave;
VoidCallback onCancel;

  DialogBox({
    super.key,
    required this.controller,
    required this.onSave,
    required this.onCancel,
  });

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      backgroundColor: Colors.black,
      content: Container(
        decoration: BoxDecoration(color: Colors.black, boxShadow: [
          BoxShadow(
            color: Colors.green.withOpacity(1),
            spreadRadius: 2,
            blurRadius: 5,
            offset: const Offset(0, 1),
          )
        ]),
        height: 120,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: [
            Padding(
              padding: const EdgeInsets.only(left: 10.0,top: 3.0,right: 10.0),
              child: TextField(
                controller: controller,
                decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    hintText: "Add a new item",
                    hintStyle: TextStyle(color: Color.fromRGBO(0, 255, 0, 1))),
                style: const TextStyle(color: Color.fromRGBO(0, 255, 0, 1)),
              ),
            ),
            Row(
              children: [
                MyButton(text: "save", onPressed: onSave),
                const SizedBox(
                  width: 8,
                ),
                MyButton(text: "cancel", onPressed: onCancel),
              ],
            )
          ],
        ),
      ),
    );
  }
}

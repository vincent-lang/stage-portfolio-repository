// ignore_for_file: must_be_immutable

import 'package:flutter/material.dart';

class MyButton extends StatelessWidget {
  final String text;
  VoidCallback onPressed;

  MyButton({
    super.key,
    required this.text,
    required this.onPressed,
  });

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(left: 15.0,bottom: 10.0),
      child: Container(
        decoration: BoxDecoration(
          color: Colors.black,
          borderRadius: BorderRadius.circular(12),
          boxShadow: [
            BoxShadow(
              color: Colors.green.withOpacity(1),
              spreadRadius: 2,
              blurRadius: 5,
              offset: const Offset(0, 1),
            )
          ],
        ),
        child: MaterialButton(
          onPressed: onPressed,
          color: const Color.fromRGBO(0, 0, 0, 1),
          child: Text(
            text,
            style: const TextStyle(color: Color.fromRGBO(0, 255, 0, 1)),
          ),
        ),
      ),
    );
  }
}

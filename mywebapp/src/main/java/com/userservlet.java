package com;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/submit")
public class userservlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        String username = request.getParameter("username");
        
        // Store the username in a cookie
        Cookie cookie = new Cookie("username", username);
        cookie.setMaxAge(60 * 60 * 24); // 1 day
        response.addCookie(cookie);
        
        // Redirect back to the main page
        response.sendRedirect("index.html");
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        // Retrieve the cookie
        Cookie[] cookies = request.getCookies();
        String username = "";
        if (cookies != null) {
            for (Cookie cookie : cookies) {
                if (cookie.getName().equals("username")) {
                    username = cookie.getValue();
                }
            }
        }
        
        // Forward to the JSP page with the username
        request.setAttribute("username", username);
        request.getRequestDispatcher("index.html").forward(request, response);
    }
}
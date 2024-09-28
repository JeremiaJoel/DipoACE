import React from 'react';
import { Calendar, BarChart2, BookOpen, Clock } from 'lucide-react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer } from 'recharts';

const data = [
  { day: 'Mon', hours: 5 },
  { day: 'Tue', hours: 7 },
  { day: 'Wed', hours: 4 },
  { day: 'Thu', hours: 3 },
  { day: 'Fri', hours: 6 },
];

const Dashboard = () => {
  return (
    <div className="flex h-screen bg-gray-100">
      {/* Sidebar */}
      <div className="w-64 bg-black text-white p-6">
        <div className="mb-8">
          <div className="w-20 h-20 bg-green-700 rounded-full flex items-center justify-center mb-4">
            <span className="text-4xl font-bold">N</span>
          </div>
          <p className="text-sm">asep@dekan.dipoace</p>
        </div>
        <nav>
          <a href="#" className="flex items-center mb-4 text-gray-300 hover:text-white">
            <BarChart2 className="mr-2" size={20} />
            Dashboard
          </a>
          <a href="#" className="flex items-center text-gray-300 hover:text-white">
            <BookOpen className="mr-2" size={20} />
            Academic
          </a>
        </nav>
      </div>

      {/* Main content */}
      <div className="flex-1 p-8 overflow-auto">
        <header className="flex justify-between items-center mb-8">
          <div className="flex items-center">
            <img src="/api/placeholder/40/40" alt="Logo" className="mr-4" />
            <h1 className="text-2xl font-bold">DipoACE</h1>
          </div>
          <h2 className="text-2xl font-bold">Dashboard</h2>
        </header>

        {/* Quick access buttons */}
        <div className="flex space-x-4 mb-8">
          {['Academic', 'Task', 'Schedule'].map((item, index) => (
            <button key={index} className="p-4 bg-white rounded-lg shadow flex flex-col items-center justify-center">
              <div className="w-8 h-8 mb-2 bg-gray-200 rounded-full flex items-center justify-center">
                {index === 0 && <Calendar size={20} />}
                {index === 1 && <BookOpen size={20} />}
                {index === 2 && <Clock size={20} />}
              </div>
              <span>{item}</span>
            </button>
          ))}
        </div>

        <div className="flex flex-col lg:flex-row space-y-8 lg:space-y-0 lg:space-x-8">
          {/* Welcome section */}
          <div className="flex-1">
            <h2 className="text-3xl font-bold mb-2">Welcome Back, Asep</h2>
            <p className="text-gray-600 mb-8">How are you today?</p>
            
            {/* Tasks */}
            <h3 className="font-bold mb-4">Task</h3>
            <div className="space-y-4">
              {['Approve The Classrooms', 'Approve Lecturer Schedule'].map((task, index) => (
                <div key={index} className="p-4 bg-white rounded-lg shadow flex items-center">
                  <BookOpen className="mr-4" size={20} />
                  <span>{task}</span>
                </div>
              ))}
            </div>
          </div>

          {/* Right column */}
          <div className="lg:w-80">
            {/* Time chart */}
            <div className="bg-white p-4 rounded-lg shadow mb-8">
              <h3 className="font-bold mb-2">6 hr, 20 min</h3>
              <p className="text-sm text-gray-600 mb-4">Today</p>
              <div className="h-48">
                <ResponsiveContainer width="100%" height="100%">
                  <BarChart data={data}>
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis dataKey="day" />
                    <YAxis />
                    <Tooltip />
                    <Bar dataKey="hours" fill="#8884d8" />
                  </BarChart>
                </ResponsiveContainer>
              </div>
            </div>

            {/* Calendar */}
            <div className="bg-white p-4 rounded-lg shadow mb-8">
              {/* Calendar component would go here */}
              <div className="text-center">Calendar Placeholder</div>
            </div>

            {/* Upcoming Schedule */}
            <h3 className="font-bold mb-4">Upcoming Schedule</h3>
            <div className="space-y-4">
              {[
                { title: 'Teaching data structure course', time: '9:00-13:00 E101' },
                { title: 'Weekly meeting', time: '13:00-15:00 Dekanat' }
              ].map((event, index) => (
                <div key={index} className="p-4 bg-white rounded-lg shadow">
                  <div className="flex items-center mb-2">
                    {index === 0 ? <BookOpen size={20} className="mr-2" /> : <Clock size={20} className="mr-2" />}
                    <span className="font-bold">{event.title}</span>
                  </div>
                  <p className="text-sm text-gray-600">{event.time}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;